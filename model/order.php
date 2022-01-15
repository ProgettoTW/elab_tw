<?php
class Order{

    private $id;
    private $userId;
    private $time;

    public function __construct($userId){
        $this->userId = $userId;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getUserId(){
        return $this->userId;
    }

    public function setUserId($userId){
        $this->userId = $userId;
    }

    public function getTime(){
        return $this->time;
    }

    public function setTime($time){
        $this->time = $time;
    }

}
?>
