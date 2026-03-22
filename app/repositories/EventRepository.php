<?php
require_once __DIR__ . '/../../core/Database.php';
class EventRepository{
    private $db;
    public function __construct(){
        $this->db=Database::getConnection();
    }
    public function getEvents(){
        $stmt=$this->db->query("SELECT * FROM events");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>