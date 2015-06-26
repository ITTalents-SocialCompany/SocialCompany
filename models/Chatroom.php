<?php
class Chatroom extends MasterModel{
	private $chatroom_id;
	private $title;
	private $participants;
	private $table = "chatrooms";
	
	public function __construct($title = null, $participants = null, $chatroom_id = null){
		parent::__construct();
		$this->setTitle($title);
		$this->setParticipants($participants);
		$this->setChatroom_id($chatroom_id);
	}
	
	public function getTitle(){
		return $this->title;
	}
	
	public function setTitle($title){
		$this->title = $title;
	}
	
	public function getParticipants(){
		return $this->participants;
	}
	
	public function setParticipants($participants){
		$this->participants = $participants;
	}
	
	public function getChatroom_id(){
		return $this->chatroom_id;
	}
	
	public function setChatroom_id($chatroom_id){
		$this->chatroom_id = $chatroom_id;
	}
	
	public function saveChatroom(Chatroom $chatroom, $fields){
		return $this->insert($this->table, $fields, $chatroom->objectToArray());
	}
	
	public function getAllChatrooms(){
		$rows = $this->selectAll($this->table, "", "", null);

		if(count($rows) > 0){
			foreach ($rows as $chatroom){
				$chatrooms[] = new Chatroom($chatroom["chat_title"], $chatroom['participants'], $chatroom['chatroom_id']);
			}
			return $chatrooms;				
		} 
	}
	
	public function objectToArray(){
		return get_object_vars($this);
	}
}