<?php

namespace second_file;

class Article
{

    private $author;
    private $title;

    public function __construct($title, $author)
    {
        $this->author = $author;
        $this->title = $title;
    }

    /**
     * Get the value of author
     */ 
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

}
