<?php
class EventController extends MasterController{
    public function __construct(){
        parent::__construct();
        Auth::isAuthorized();
    }
    
    public function index(){
    	$event = new Event();
    	$event = $event->getAllEvents();
    	$this->renderViewWithParams("events/index", array("events"), array($event));	
    }
    
    public function event($args){
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
			$coverFilePath = "/storage/events/$realFilenameCover";
			$newEvent->setCoverImg($coverFilePath);
			if(isset($filenameCover)){
				$this->saveImg($filenameCover, $coverFilePath, $folder);
			}
		}
		
		$event_time = explode("/",$post['event_time']);
		$this->swap($event_time[0], $event_time[2]);
		$this->swap($event_time[1], $event_time[2]);
		$event_time = implode("-",$event_time);
		
		
		$newEvent->title = $post['title'];
        $newEvent->body = $post['body'];
        $newEvent->add_time = $this->getLocalTime();
        $newEvent->event_time = $event_time;
        
        if($newEvent->saveEvent($newEvent, $fields)){
        	$this->redirect("/event");
        }else{
        	echo "Error Uploading info";
        }
        
       
	}

//     public function allPostAjax($args){
//         $start = $args[0];
//         $post = new Post();
//         if(count($args) > 1){
//             $id = $args[1];
//             $posts = $post->getAll($start, "category_id = '$id'");
//         }else{
//             $posts = $post->getAll($start);
//         }
//         $this->renderViewAjax("home/posts", "posts", $posts);
//     }
} 