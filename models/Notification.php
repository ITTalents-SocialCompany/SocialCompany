<?php 
class Notification extends MasterModel{
	private $notification_id;
	private $user_id;
	private $object_id;
	private $seen;
	private $title;
	private $table = "notifications";

	
	public function __construct($notification_id = null, $user_id = null, $object_id = null, $seen = null, $title = null){
		parent::__construct();
		$this->setNotificationId($notification_id);
		$this->setUserId($user_id);
		$this->setObjectId($object_id);
		$this->setSeen($seen);
		$this->setTitle($title);
	}
	
	public function __get($name){
		return $this->$name;
	}
	
	public function setUserId($user_id){
		$this->user_id = $user_id;
	}
	
	public function setObjectId($object_id){
		$this->object_id = $object_id;
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
	
	public function saveChatNotification($fields){
		return $this->insert("notifications_chatroom", $fields, $this->objectToArray($this));		
	}
	
	public function savePostNotification($fields){
		return $this->insert("notifications_post", $fields, $this->objectToArray($this));
	}
	
	public function getAllChatNotifications($id){
		$rows = $this->selectAllWithJoin("notifications_chatroom","chatrooms","chatroom_id","LEFT", "user_id = $id AND is_seen = 0","*","");
		if(count($rows) > 0){
			foreach ($rows as $chatNotification){
				$notifications[] = new Notification($chatNotification['notification_id'], $chatNotification['user_id'], $chatNotification['chatroom_id'], $chatNotification['is_seen'], $chatNotification["chat_title"]);
			}
			return $notifications;
			//var_dump($notifications);
		}
	}
	
	public function getAllPostNotifications($id){
		$rows = $this->selectAllWithJoin("notifications_post","posts","post_id","LEFT", "user_id = $id AND is_seen = 0","*", "");
		if(count($rows) > 0){
			foreach ($rows as $postNotification){
				$notifications[] = new Notification($postNotification['notification_id'], $postNotification['user_id'], $postNotification['post_id'], $postNotification['is_seen'], $postNotification['title']);
			}
			return $notifications;
			//var_dump($notifications);
		}
	}
	
	public function changeChatStatus($chatroom_id, $user_id){
		return $this->update("notifications_chatroom", array('is_seen'), array('is_seen'=>1), $where = "chatroom_id = $chatroom_id AND user_id = $user_id");
	}
	
	public function changePostStatus($post_id, $user_id){
		return $this->update("notifications_post", array('is_seen'), array('is_seen'=>1), $where = "post_id = $post_id AND user_id = $user_id");
	}
	
	public function objectToArray(){
		return get_object_vars($this);
	}
	
}
?>