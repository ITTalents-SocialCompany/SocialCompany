<?php
class EventController extends MasterController{
    public function __construct(){
        parent::__construct();
        Auth::isAuthorized();
    }
    
    public function index(){
    	$this->renderView("events/index");
    }

	public function saveEvent($post){
        $tagged_users = array();
        if(isset($post['tagged_users'])){
            $tagged_users = $post["tagged_users"];
            unset($post['tagged_users']);
        }
        $tagged_users[] = Auth::getId();

		$fields = $this->takeFields($post);
		var_dump($post);
		$newEvent = new Event();
		$newEvent->title = $post['title'];
        $newEvent->body = $post['body'];
        $newEvent->event_time = $post['event_time'];
        $newEvent->cover_img_url = $post['cover_img_url'];
//        var_dump($tagged_users);
        $event_id = $newEvent->saveEvent($newEvent, $fields);

		if($event_id !== 0){
            foreach($tagged_users as $tagged_user){
                $event_to_user = new EventToUser($event_id, $tagged_user);
                $event_to_user->save("event_id,user_id");
            }
            $this->redirect("/");
        }else{
            echo "Error!";
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