<?php
class EventService{
    public function __construct($repository){
        $this->repository=$repository;
    }
    public function getEventsFreeSpot(){
        return $this->repository->getEventsFreeSpot();
    }
    public function eventRegister($eventId,$userData){
        $this->repository->transactionBegin();
        try {
            $event = $this->repository->getEventsForUpdate($eventId);
            if (!$event) {
                throw new Exception("Event not found");
            }
            if (strtotime($event['start_date']) <= time()) {
                throw new Exception("Event already started or expired");
            }
            $count = $this->repository->getAttendeesCount($eventId);
            $capacity=$event['capacity'];
            if ($count>=$event['capacity']) {
                throw new Exception("Event is full");
            }
            $ticket = bin2hex(random_bytes(5));
            $this->repository->eventRegister($eventId,$userData,$ticket);
            $count++;
            if ($count>=$capacity) {
                file_put_contents(__DIR__ . '/../../logs/app.log', date('Y-m-d H:i:s')." | [INFO] | Event {$eventId} full\n", FILE_APPEND);
            }
            $this->repository->transactionCommit();
            return $ticket;
        } catch (Exception $e) {
            $this->repository->transactionRollBack();
            throw $e;
        }
    }
}
?>