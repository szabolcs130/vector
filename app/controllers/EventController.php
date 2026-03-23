<?php
require_once __DIR__ . '/../services/EventService.php';
class EventController{
    private $service;
    public function __construct($service){
        $this->service=$service;
    }
    public function getEventsFreeSpot(){
        header('Content-Type: application/json');
        echo json_encode($this->service->getEventsFreeSpot());
    }
    public function eventRegister($eventId){
        header('Content-Type: application/json');
        $userData = json_decode(file_get_contents("php://input"), true);
        $ticket = $this->service->eventRegister($eventId,$userData);
        echo json_encode([
            "message" => "Registered",
            "ticket" => $ticket
        ]);
    }
}
?>