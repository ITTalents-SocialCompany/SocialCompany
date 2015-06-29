<?php
class EventController extends MasterController{
    public function __construct(){
        parent::__construct();
        Auth::isAuthorized();
    }
    
    public function index(){
    	$this->renderView("events/index");
    }
    
    public function addEvent(){
    	$this->renderView("events/addEvent");
    }
    
	public function addEventPost($post){
		var_dump($_FILES['cover_img_url']['name']);
		$folder = "/storage/events";
		if(strcmp($_FILES['cover_img_url']['name'], "") !== 0){
			$fields[] = "cover_img_url";
			$filenameCover = $_FILES['cover_img_url']['tmp_name'];
			$realFilenameCover = $_FILES['cover_img_url']['name'];
			$coverFilePath = "/storage/events/$realFilenameCover";
			$newEvent->setCoverImg($coverFilePath);
			 
		}
		
// 		if(isset($filenameCover)){
// 			$this->saveImg($filenameCover, $coverFilePath, $folder);
// 		}
		
		$fields = $this->takeFields($post);
		$fields .= ",cover_img_url";
		
		$event_time = explode("/",$post['event_time']);
		$this->swap($event_time[0], $event_time[2]);
		$this->swap($event_time[1], $event_time[2]);
		$event_time = implode("-",$event_time);
		
		$newEvent = new Event();
		$newEvent->title = $post['title'];
        $newEvent->body = $post['body'];
        $newEvent->add_time = $post['add_time'];
        $newEvent->event_time = $event_time;
        $newEvent->setCoverImg($_FILES['cover_img_url']['tmp_name']);
        
        
        $newEvent->saveEvent($newEvent, $fields);
        	var_dump($newEvent);
        	echo "<br/>";
        	var_dump($fields);
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