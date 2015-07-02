<?php
class NotificationController extends MasterController{
    public function __construct(){
    	parent::__construct();
        Auth::isAuthorized();
        
    }

    public function index(){
        $this->renderView("notifications/index");
    }
    
    public function countNotifications(){
    	$id = Auth::getId();
    	$notification = new Notification();
    	$notifications = $notification->getAllchatNotifications($id);
     	echo count($notifications);
    }
    
    public function getAllNotifications(){
    	$id = Auth::getId();
    	$chatNotification = new Notification();
    	$chatNotifications = $chatNotification->getAllchatNotifications($id);

//     	$postNotification = new Notification();
//     	$postNotifications = $chatNotification->getAll($id);
//     	$postNotifications = $postNotification->getAllpostNotifications($id);
    	
    	$this->renderViewAjax("notifications/log", array('chatNotifications'), array($chatNotifications));
    }
    
    public function changeNotificationStatus($args){
    	$chatroom_id = $args[0];
    	$user_id = Auth::getId();
    	$notification = new Notification();
    	$notification->changeStatus($chatroom_id, $user_id);
    	
    }
}