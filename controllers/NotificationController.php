<?php
class NotificationController extends MasterController{
    public function __construct(){
    	parent::__construct();
        Auth::isAuthorized();
        
    }

    public function index(){
        $this->renderView("notifications/index");
    }
    
    public function countChatNotifications(){
    	$id = Auth::getId();
    	$notification = new Notification();
    	$notifications = $notification->getAllChatNotifications($id);
     	echo count($notifications);
    }
    
    public function countPostNotifications(){
    	$id = Auth::getId();
    	$postNotification = new Notification();
    	$postNotifications = $postNotification->getAllPostNotifications($id);
    	echo count($postNotifications);
    }
    
    public function getAllNotifications(){
    	$id = Auth::getId();
    	$chatNotification = new Notification();
    	$chatNotifications = $chatNotification->getAllChatNotifications($id);

    	$postNotification = new Notification();
    	$postNotifications = $postNotification->getAllPostNotifications($id);
    	
    	$this->renderViewAjax("notifications/log", array('chatNotifications','postNotifications'), array($chatNotifications,$postNotifications));
    }
    
    public function changeChatNotificationStatus($args){
    	var_dump($args);
    	$chatroom_id = $args[0];
    	$user_id = Auth::getId();
    	$notification = new Notification();
    	$notification->changeChatStatus($chatroom_id, $user_id);   	
    }
    
    public function changePostNotificationStatus($args){
    	
    	$post_id = $args[0];
    	$user_id = Auth::getId();
    	$notification = new Notification();
    	$notification->changePostStatus($post_id, $user_id);
    }
}