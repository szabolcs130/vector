<?php
require_once __DIR__ . '/../services/EventService.php';
require_once __DIR__ . '/../validators/RequestValidator.php';
require_once __DIR__ . '/../exceptions/ValidationException.php';
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
        try {
            RequestValidator::validateRegister($userData);
            $ticket = $this->service->eventRegister($eventId,$userData);
            http_response_code(201);
            echo json_encode([
                "message" => "Registered",
                "ticket" => $ticket
            ]);
        } catch (ValidationException $e) {
            http_response_code(422);
            echo json_encode([
                "error" => "Validation failed",
                "details" => $e->getErrors()
            ]);
        } catch (Exception $e) {
            http_response_code(400);
            echo json_encode([
                "error" => $e->getMessage()
            ]);
        }
        
    }
}
?>