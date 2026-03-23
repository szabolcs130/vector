<?php
class EventService{
    public function __construct($repository){
        $this->repository=$repository;
    }
    public function getEventsFreeSpot(){
        return $this->repository->getEventsFreeSpot();
    }
    public function eventRegister($eventId,$userData){
        return $this->repository->Eventregister($eventId,$userData);
    }
}
?>