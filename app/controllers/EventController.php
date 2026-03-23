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
}
?>