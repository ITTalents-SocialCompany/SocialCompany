<?php
class ChatroomToUser extends MasterModel{
	private $chatroom_id;
	private $user_id;
	private $table = "chatrooms_view";

	public function __construct($chatroom_id = 0, $user_id = 0){
		parent::__construct();
		Auth::getId();
		$this->setChatroomId($chatroom_id);
		$this->setUserId($user_id);
	}

	public function __get($name) {
		return $this->$name;
	}

	public function setChatroomId($chatroom_id){
		$this->chatroom_id = $chatroom_id;
	}

	public function setUserId($user_id){
		$this->user_id = $user_id;
	}
	
	public function setChatTitle($title){
		$this->chat_title = $title;
	}

	public function objectToArray(){
		return get_object_vars($this);
	}

	public function arrayToObject(ChatroomToUser $chatroom_to_user, $arr){
		foreach ($arr as $key => $value)
		{
			if(property_exists('Chatroom', $key)){
				$chatroom_to_user->$key = $value;
			}
		}
		return $chatroom_to_user;
	}

	public function save($fields){
		var_dump($this->objectToArray($this));
		return $this->insert("users_chatrooms", $fields, $this->objectToArray($this));
	}

	public function getAllChatroomsForUser($id){
			
		$users_chatooms = $this->selectAll("users_chatrooms", "user_id = $id","","DISTINCT chatroom_id,user_id",null);
		foreach ($users_chatooms as $users_chatoom){
			$arr[] = $users_chatoom['chatroom_id'];
		}
		$arr = implode(",", $arr);
// 		var_dump($arr);
		$rows = $this->selectAll($this->table, "chatroom_id IN ($arr)","chatroom_id desc" , "*", null);
		
		if(count($rows) > 0){
			foreach ($rows as $chat){
				$chats[] = new Chatroom($chat['chat_title'], $chat["participants"],$chat['chatroom_id'] );
			}
// 			var_dump($chats);
			return $chats;				
		}else{
			throw new Exception('No chats');
		}
	}
	
	
	
	
	
	
	
}