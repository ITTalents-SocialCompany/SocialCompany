<?php
class MessageController extends MasterController{
    public function __construct(){
    	parent::__construct();
        Auth::isAuthorized();
        
    }

    public function index(){
        $this->renderView("messages/index");
    }
    
    public function addChatroom($post){
    	//$this->getAllUsers("messages/addChatroom");
    	$this->renderView("messages/addChatroom");
    	if(isset($post)){
    		$fields = $this->takeFields($post);
    		var_dump($post);
	    	$newChatroom = new Chatroom();
	    	$newChatroom->setParticipants(implode(",",$post['participants']));
	    	$newChatroom->setTitle($post['chat_title']);
	    	 
	    	if(!$newChatroom->saveChatroom($newChatroom, $fields)){
	    		$this->redirect("/message/index");
	    	}else{
	    		echo "Error!";
	    	}
    	}
    }
    
    public function getAllUsers($url = "messages/getAllUsers"){
    	$user = new User();
    	$user = $user->getAllUsers();
    	$this->renderViewAjax($url, "users", $user);
    }
    
    public function getAllChatrooms(){
    	//$this->getAllUsers("messages/chatrooms");
    	$chatroom = new Chatroom();
    	$chatroom = $chatroom->getAllChatrooms();
    	$this->renderViewAjax("messages/chatrooms", "chatrooms", $chatroom);
    }
    
    public function addMessage($post){
    		var_dump($post);
	    	$fields = $this->takeFields($post);
	    	
	    	$newMessage = new Message();
	    	//$newMessage->setTitle("test");//$message['title']);
	    	$newMessage->setUsername($post['user_id']);
	    	$newMessage->setMessage($post['message']);
	    	$newMessage->setChatroomId($post['chatroom_id']);
	    	$newMessage->setTime($this->getLocalTime());
	
	       	$newMessage->saveMessage($newMessage, $fields);

    	
    }
    
    public function getAllMessages(){

    	$message = new Message();
    	$message = $message->getAllMessages();
    	$this->renderViewAjax("messages/logs", "messages", $message);
    }
    
    public function getLocalTime(){
    	$mydate=getdate(date("U"));
    	return "$mydate[year]-$mydate[mon]-$mydate[mday] $mydate[hours]:$mydate[minutes]:$mydate[seconds]";
    }
    
    
}