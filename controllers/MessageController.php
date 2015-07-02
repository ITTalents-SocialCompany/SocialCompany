<?php
class MessageController extends MasterController{
    public function __construct(){
    	parent::__construct();
        Auth::isAuthorized();
        
    }

    public function index(){
        $this->renderView("messages/index");
    }
    
   
    public function addChatroom(){
    	$user = new User();
    	$user = $user->getAllUsers();
    	$this->renderViewWithParams("messages/addChatroom", array("users"), array($user));
    }
    
    public function addChatroomPost($post){
    	if(isset($post)){
    		$participants = array();
    		if(isset($post['participants'])){
    			$participants = $post["participants"];
    			unset($post['participants']);
    		}
    		
    		$usersToNotify = $participants;
    		$participants[] = Auth::getId();

    		$newChatroom = new Chatroom();
    		$newChatroom->setTitle($post['chat_title']);
    		$chatroom_id = $newChatroom->saveChatroom($newChatroom, "chat_title");
    	
    		if($chatroom_id !== 0){
    			foreach($participants as $participant){
    				$chatroom_to_user = new ChatroomToUser($chatroom_id, $participant);
    				$chatroom_to_user->save("chatroom_id,user_id");
    			}
    			foreach ($usersToNotify as $userToNotify){
    				$notification = new Notification($userToNotify, $chatroom_id, "0");
    				$notification->saveNotification("user_id,chatroom_id,seen");
    			}
    			$this->redirect("/message/index");
    		}else{
    			echo "Error!";
    		}
    	}
    }
    
    public function addMessage($post){
	
	    	$fields = $this->takeFields($post);
	    	$newMessage = new Message();
	    	$newMessage->setUsername($post['user_id']);
	    	$newMessage->setMessage($post['message']);
	    	$newMessage->setChatroomId($post['chatroom_id']);
	    	$newMessage->setTime($this->getLocalTime());
	
	       	$newMessage->saveMessage($newMessage, $fields);

    	
    }
    
    public function getAllChatrooms(){
    	 
    	$chatroomToUser = new ChatroomToUser();
    	$chatroomToUser = $chatroomToUser->getAllChatroomsForUser(Auth::getId());		
    	$this->renderViewAjax("messages/chatrooms", array("chatrooms"), array($chatroomToUser));
 
    }
    
    public function getAllMessages($args){

		$id = $args[0];
    	$message = new Message();
    	$message = $message->getAllMessagesForChat($id);
    	$this->renderViewAjax("messages/logs", array("messages"), array($message));
	
    }
    
    public function noMessages(){
    	$this->renderView("messages/noChats");
    }
    
    public function getLocalTime(){
    	$mydate=getdate(date("U"));
    	return "$mydate[year]-$mydate[mon]-$mydate[mday] $mydate[hours]:$mydate[minutes]:$mydate[seconds]";
    }
    
    
}