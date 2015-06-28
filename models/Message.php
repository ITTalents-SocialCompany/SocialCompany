<?php
class Message extends MasterModel{
	private $chatroom_id;
	private $title;
	private $message;
	private $time;
	private $username;
	private $user_id;
	private $table = "messages";
	
	public function __construct($username = null, $message = null, $time = null, $chatroom_id = null, $user_id = null){
		parent::__construct();
		$this->setUsername($username);
		$this->setMessage($message);
		$this->setTime($time);
		$this->setChatroomId($chatroom_id);
		$this->setUserId($user_id);
	}
	
	public function getChatroomId(){
		return $this->chatroom_id;
	}
	
	public function setChatroomId($chatroom_id){
		$this->chatroom_id = $chatroom_id;
	}
	
	public function getTitle(){
		return $this->title;
	}
	
	public function setTitle($title){
		$this->title = $title;
	}
	
	public function getMessage(){
		return $this->message;
	}
	
	public function setMessage($message){
		$this->message = $message;
	}
	
	public function getTime(){
		return $this->time;
	}
	
	public function setTime($time){
		$this->time = $time;
	}
	
	public function getUsername(){
		return $this->username;
	}
	
	public function setUsername($username){
		$this->username = $username;
	}
	
	public function getUserId(){
		return $this->user_id;
	}
	
	public function setUserId($user_id){
		$this->user_id = $user_id;
	}
	
	public function saveMessage(Message $message, $fields){
		return $this->insert($this->table, $fields, $message->objectToArray());
	}
	
	public function getAllMessagesForChat($chatroom_id){
		$rows = $this->selectAllWithJoin("messages", "users", "user_id", "LEFT", "chatroom_id=$chatroom_id","*", "me.message_id");
		if(count($rows) > 0){
			foreach ($rows as $message){
				$messages[] = new Message($message["username"], $message['message'], $message['add_time'], $message['chatroom_id'], $message['user_id']);
			}
			return $messages;
			
		}
	}
	
	public function objectToArray(){
		return get_object_vars($this);
	}
	
	
}