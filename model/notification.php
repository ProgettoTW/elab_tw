<?php

class Notification
{

    private int $ID;
    private string $userId;
    private string $datetime;
    private string $status;
    private $seen;


    public function __construct($userId, $datetime, $status)
    {
        $this->userId = $userId;
        $this->status = $status;
        $this->datetime = $datetime;
    }

    public function getId(): int
    {
        return $this->ID;
    }


    public function setId(int $ID): void
    {
        $this->ID = $ID;
    }

    public function getUserId(): string
    {
        return $this->userId;
    }


    public function setUserId(string $userId): void
    {
        $this->userId = $userId;
    }

    public function getDatetime(): string
    {
        return $this->datetime;
    }


    public function setDatetime(string $datetime): void
    {
        $this->datetime = $datetime;
    }


    public function getStatus(): string
    {
        return $this->status;
    }


    public function setStatus(string $status): void
    {
        $this->status = $status;
    }


    public function getSeen()
    {
        return $this->seen;
    }


    public function setSeen($seen): void
    {
        $this->seen = $seen;
    }


}