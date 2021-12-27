<?php
class Cart{

  private $id;
  private $userId;

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

}
?>
