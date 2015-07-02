<?php 
class Notification extends MasterModel{
	private $notification_id;
	private $user_id;
	private $chatroom_id;
	private $seen;
	private $title;
	private $table = "notifications";

	
	public function __construct($notification_id = null, $user_id = null, $chatroom_id = null, $seen = null, $title = null){
		parent::__construct();
		$this->setNotificationId($notification_id);
		$this->setUserId($user_id);
		$this->setChatroomId($chatroom_id);
		$this->setSeen($seen);
		$this->setTitle($title);
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
	
	public function setTitle($title){
		$this->title = $title;
	}
	
	public function setNotificationId($notification_id){
		$this->notification_id = $notification_id;
	}
	
	public function saveNotification($fields){
		return $this->insert("notifications", $fields, $this->objectToArray($this));		
	}
	
	public function savePostNotification($fields){
		return $this->insert("postnotification", $fields, $this->objectToArray($this));
	}
	
	public function getAllChatNotifications($id){
		$rows = $this->selectAllWithJoin("notifications","chatrooms_view","chatroom_id","LEFT", "user_id = $id AND seen = 0","*","");
		if(count($rows) > 0){
			foreach ($rows as $notification){
				$notifications[] = new Notification($notification['notification_id'], $notification['user_id'], $notification['chatroom_id'], $notification['seen'], $notification["chat_title"]);
			}
			return $notifications;
			//var_dump($notifications);
		}
	}
	
	public function getAllPostNotifications($id){
		$rows = $this->selectAllWithJoin("postNotifications","posts","post_id","LEFT", "user_id = $id AND is_seen = 0","*", "");
		if(count($rows) > 0){
			foreach ($rows as $postNotification){
				$notifications[] = new Notification($postNotification['notification_id'], $postNotification['user_id'], $postNotification['post_id'], $postNotification['is_seen'], $postNotification['title']);
			}
			return $notifications;
			//var_dump($notifications);
		}
	}
	
	public function changeStatus($chatroom_id, $user_id){
		return $this->update("notifications", array('seen'), array('seen'=>1), $where = "chatroom_id = $chatroom_id AND user_id = $user_id");
	}
	
	public function objectToArray(){
		return get_object_vars($this);
	}
	
}
?>