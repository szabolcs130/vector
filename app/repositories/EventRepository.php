<?php
require_once __DIR__ . '/../../core/Database.php';
class EventRepository{
    private $db;
    public function __construct(){
        $this->db=Database::getConnection();
    }
    public function getEventsFreeSpot(){
        $stmt=$this->db->query(
            "SELECT e.*, 
            (e.capacity - COUNT(a.id)) as free_spots
            FROM events e
            LEFT JOIN attendees a ON e.id = a.event_id
            WHERE e.start_date > NOW()
            GROUP BY e.id"
        );
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function Eventregister($eventId,$userData){
        $stmt = $this->db->prepare("
            INSERT INTO attendees (event_id, email, name, ticket_code)
            VALUES (?, ?, ?, ?)
        ");
        $ticket = bin2hex(random_bytes(5));
        $stmt->execute([
            $eventId,
            $userData['email'],
            $userData['name'],
            $ticket
        ]);
        return $ticket;
    }
}
?>