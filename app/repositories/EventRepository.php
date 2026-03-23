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
}
?>