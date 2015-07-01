<?php 
class Notification extends MasterModel{
	private $notification_id;
	private $user_id;
	private $message_id;
	private $seen;

	
	public function __construct($user_id = null, $message_id = null, $seen = null){
		parent::__construct();
		
		$this->setUserId($user_id);
		$this->setMessageId($message_id);
		$this->setSeen($seen);
	}
	
	public function __get($name){
		return $this->$name;
	}
	
	public function setUserId($user_id){
		$this->user_id = $user_id;
	}
	
	public function setMessageId($message_id){
		$this->message_id = $message_id;
	}
	
	public function setSeen($seen){
		$this->seen = $seen;
	}
	
	public function saveNotification($fields){
		return $this->insert("notifications", $fields, $this->objectToArray($this));
		
	}
	
	public function objectToArray(){
		return get_object_vars($this);
	}
	
}
?>