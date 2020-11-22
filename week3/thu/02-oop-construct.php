<?php 

class Post {

    public $title;
    public $body;
    public $postedAt;

    public function __construct(string $title, string $body = '', string $postedAt = '') {
       $this->title = $title;
       $this->body = $body;

       $this->postedAt = $postedAt ? $postedAt : date('Y-m-d H:i:s');

    }


    public function getTitle(): string {
        return $this->title;
    }


    public function setTitle(string $title) {
        $this->title = $title;
    }

}

$p = new Post("Welcome to a new world", "Body");

var_dump($p);
