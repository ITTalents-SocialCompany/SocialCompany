<?php
class EventController extends MasterController{
    public function __construct(){
        parent::__construct();
        Auth::isAuthorized();
    }
    
    public function index(){
    	$event = new Event();
    	$event = $event->getAllEvents("");
    	$this->renderViewWithParams("events/index", array("events"), array($event));	
    }
    
    public function show($args){
  		$id = $args[0];
    	$event = new Event();
    	$event = $event->getEvent($id);
    	$this->renderViewWithParams("events/event", array("event"), array($event));
    }
    
    public function addEvent(){
    	$this->renderView("events/addEvent");
    }
    
	public function addEventPost($post){
		$fields = $this->takeFields($post);
		$newEvent = new Event();
		$folder = "/storage/events";
		
		if(strcmp($_FILES['cover_img_url']['name'], "") !== 0){
			$fields .= ",cover_img_url";
			
			$filenameCover = $_FILES['cover_img_url']['tmp_name'];// = temp file
			$realFilenameCover = $_FILES['cover_img_url']['name'];// = cv_photo.jpg
			$coverFilePath = "/storage/events/". substr($post['title'], 0, 10) ."_$realFilenameCover";
			$newEvent->setCoverImgUrl($coverFilePath);
			if(isset($filenameCover)){
				$this->saveImg($filenameCover, $coverFilePath, $folder);
			}
		}

		$newEvent->title = $post['title'];
        $newEvent->body = $post['body'];
        $newEvent->add_time = $this->getLocalTime();
        $newEvent->event_time = $post['event_time'];
        
        if($newEvent->saveEvent($newEvent, $fields)){
        	$this->redirect("/event");
        }else{
        	echo "Error Uploading info";
        }
        
       
	}
	
	public function edit($args){
		$id = $args[0];
		$event = new Event();
		$event->getOne($event, $id);
		$this->renderViewWithParams("events/edit", array("event"), array($event));
	}
	
	public function editEvent($post){
		$id = $post['event_id'];
		unset($post['event_id']);
		$fields = array('title', 'body', 'event_time');
		$changeEvent = new Event();
		$changeEvent->setTitle($post['title']);
		$changeEvent->setBody($post['body']);
		$changeEvent->setEventTime($post['event_time']);
		if($changeEvent->change($post, $fields, $id)){
			$this->redirect("/event/index");
		}
	}
	
	public function delete($args){
		$id = $args[0];
		$event = new Event();
		if($event->deleteOne($id)){
			$this->redirect("/event/index");
		}
		
	}

	
	
	
	
	
	
	
	
} 