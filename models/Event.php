<?php
class Event extends MasterModel{
    private $title;
    private $body;
    private $add_time;
    private $event_time;
    private $cover_img_url; 
    private $event_id;   
    private $table = "events";

    public function __construct($event_id = null, $title = null, $body = null,$event_time = null, $cover_img_url = null){
        parent::__construct();
        $this->event_id = $event_id;
        $this->title = $title;
        $this->body = $body;
        $this->event_time = $event_time;
        $this->setCoverImg($cover_img_url);
    }

    public function __get($name) {
        return $this->$name;
    }
    
    public function __set($name, $value){
    	$this->$name = $value;
    }
    
    public function setCoverImg($cover_img_url){
    	$this->cover_img_url = $cover_img_url;
    }

    public function saveEvent(Event $event, $fields){
        return $this->insert($this->table, $fields, $this->objectToArray($event));
    }
    
    public function objectToArray(){
    	return get_object_vars($this);
    }
    
    public function arrayToObject(Event $event, $arr){
    	foreach ($arr as $key => $value)
    	{
    		if(property_exists('Event', $key)){
                $event->$key = $value;
    		}
    	}
    	return $event;
    }

    public function getEvent($id){
    	$row = $this->selectOne($this->table, "event_id = $id", "*", "", null, null);
		$oneEvent = new Event($row['event_id'], $row['title'], $row['body'], $row['event_time'], $row['cover_img_url']);
		return $oneEvent;
        
    }
    
    public function getAllEvents(){
        $rows = $this->selectAll($this->table, "", "event_time", "*","");
        if(count($rows) > 0){
            foreach ($rows as $event){
                $events[] = new Event($event['event_id'], $event['title'], $event['body'], $event['event_time'], $event['cover_img_url']);
            }
            return $events;
        }
    }
}