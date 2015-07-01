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
        $this->setTitle($title);
        $this->setBody($body);
        $this->setEventTime($event_time);
        $this->setCoverImgUrl($cover_img_url);
    }

    public function __get($name) {
        return $this->$name;
    }
    
    public function __set($name, $value){
    	$this->$name = $value;
    }
    
    public function setTitle($title){
    	$this->title = $title;
    }
    
    public function setBody($body){
    	$this->body = $body;
    }
    
    public function setEventTime($event_time){
    	$this->event_time = $event_time;
    }
    
    public function setCoverImgUrl($cover_img_url){
    	$this->cover_img_url = $cover_img_url;
    }

    public function saveEvent(Event $event, $fields){
        return $this->insert($this->table, $fields, $this->objectToArray($event));
    }
    
    public function change($post, $fields, $id){
    	return $this->update($this->table, $fields, $post, "event_id = '$id'");
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
    
	public function getOne(Event $event, $id){
        $eventArr = $this->selectOne($this->table, "event_id = $id");
        return $this->arrayToObject($event, $eventArr);
    }
    
    public function deleteOne($id){
    	return $this->delete($this->table, "event_id = $id");
    }
    
    public function getAllEvents($limit){
        $rows = $this->selectAll($this->table, "", "event_time", "*",$limit);
        if(count($rows) > 0){
            foreach ($rows as $event){
                $events[] = new Event($event['event_id'], $event['title'], $event['body'], $event['event_time'], $event['cover_img_url']);
            }
            return $events;
        }
    }
}