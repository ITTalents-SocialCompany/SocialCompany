<?php
class Message extends MasterModel{
	private $chatroom_id;
	private $title;
	private $message;
	private $time;
	private $username;
	private $table = "messages";
	
	public function __construct($username = null, $message = null, $time = null){
		parent::__construct();
		$this->setUsername($username);
		$this->setMessage($message);
		$this->setTime($time);
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
	
	public function saveMessage(Message $message, $fields){
		return $this->insert($this->table, $fields, $message->objectToArray());
	}
	
	public function getAllMessages(){
		$rows = $this->selectAllWithJoin("messages", "users", "user_id", "","*", "me.message_id");

		if(count($rows) > 0){
			foreach ($rows as $message){
				$messages[] = new Message($message["username"], $message['message'], $message['add_time']);
			}
			return $messages;
			
		}
	}
	
	public function objectToArray(){
		return get_object_vars($this);
	}
	
	
}