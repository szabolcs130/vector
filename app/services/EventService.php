<?php
class EventService{
    public function __construct($repsitory){
        $this->repsitory=$repsitory;
    }
    public function getEvents(){
        return $this->repsitory->getEvents();
    }
}
?>