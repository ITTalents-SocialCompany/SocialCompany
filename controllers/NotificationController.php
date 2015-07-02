<?php
class NotificationController extends MasterController{
    public function __construct(){
    	parent::__construct();
        Auth::isAuthorized();
        
    }

    public function index(){
        $this->renderView("notifications/index");
    }
    
    public function getAllNotifications(){
    	$id = Auth::getId();
    	$notification = new Notification();
    	$notifications = $notification->getAll($id);
//     	var_dump($notifications);
    	$this->renderViewAjax("notifications/log", array('notifications'), array($notifications));
    }
    
   
//     public function getAllChatrooms(){    
    	//     	$chatroomToUser = new ChatroomToUser();
    	//     	$chatroomToUser = $chatroomToUser->getAllChatroomsForUser(Auth::getId());
    	//     	$this->renderViewAjax("messages/chatrooms", array("chatrooms"), array($chatroomToUser));
    
    	//     }
    
    	//     public function getAllMessages($args){
    
    	// 		$id = $args[0];
    	//     	$message = new Message();
    	//     	$message = $message->getAllMessagesForChat($id);
    	//     	$this->renderViewAjax("messages/logs", array("messages"), array($message));
    
    	//     }
    
    
}