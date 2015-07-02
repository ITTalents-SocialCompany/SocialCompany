<?php 
class Notification extends MasterModel{
	private $notification_id;
	private $user_id;
	private $chatroom_id;
	private $seen;
	private $table = "notifications";

	
	public function __construct($notification_id = null, $user_id = null, $chatroom_id = null, $seen = null){
		parent::__construct();
		$this->setNotificationId($notification_id);
		$this->setUserId($user_id);
		$this->setChatroomId($chatroom_id);
		$this->setSeen($seen);
	}
	
	public function __get($name){
		return $this->$name;
	}
	
	public function setUserId($user_id){
		$this->user_id = $user_id;
	}
	
	public function setChatroomId($chatroom_id){
		$this->chatroom_id = $chatroom_id;
	}
	
	public function setSeen($seen){
		$this->seen = $seen;
	}
	
	public function setNotificationId($notification_id){
		$this->notification_id = $notification_id;
	}
	
	public function saveNotification($fields){
		return $this->insert($this->table, $fields, $this->objectToArray($this));		
	}
	
	public function getAll($id){
		$rows = $this->selectAll($this->table, "user_id = $id AND seen = 0");
		if(count($rows) > 0){
			foreach ($rows as $notification){
				$notifications[] = new Notification($notification['notification_id'], $notification['user_id'], $notification['chatroom_id'], $notification['seen']);
			}
			return $notifications;
			//var_dump($notifications);
		}
	}
	
	public function objectToArray(){
		return get_object_vars($this);
	}
	
}
?>