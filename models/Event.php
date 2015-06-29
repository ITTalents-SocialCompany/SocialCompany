<?php
class Event extends MasterModel{
    private $title;
    private $body;
    private $add_time;
    private $event_time;
    private $cover_img_url;    
    private $table = "events";

    public function __construct($title = null, $body = null){
        parent::__construct();
        $this->title = $title;
        $this->body = $body;
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

//     public function getAll($start, $where = ""){
//         $rows = $this->selectAll($this->table, $where, "post_id DESC", "$start, 5");
//         if(count($rows) > 0){
//             foreach ($rows as $post){
//                 $posts[] = new Post($post['title'], $post['body'], $post['author_id']);
//             }
//             return $posts;
//         }
//     }
}