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
    public function transactionBegin(){
        $this->db->beginTransaction();
    }
    public function transactionCommit(){
        $this->db->commit();
    }
    public function transactionRollBack(){
        $this->db->rollBack();
    }
    public function getEventsForUpdate($eventId){
        $stmt = $this->db->prepare("SELECT * FROM events WHERE id = ? FOR UPDATE");
        $stmt->execute([$eventId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getAttendeesCount($eventId){
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM attendees WHERE event_id = ?");
        $stmt->execute([$eventId]);
        return $stmt->fetchColumn();
    }
    public function eventRegister($eventId,$userData,$ticket){
        $stmt = $this->db->prepare("
                INSERT INTO attendees (event_id, email, name, ticket_code)
                VALUES (?, ?, ?, ?)
        ");
        $stmt->execute([
            $eventId,
            $userData['name'],
            $userData['email'],
            $ticket
        ]);
    }
}
?>