<?php

namespace App\Models;

class Topics
{
    private $author;
    private $topicname;
    private $category;

    public function __construct($topicname,$category){

            $this->topicname = $topicname;
            $this->author = $_SESSION['id'];
            $this->category = $category;

    }

    public function getAuthor(){
        return $this->author;
    }

    public function getTopicname (){
        return $this->topicname;
    }

    public function getCategory() {
        return $this->category;
    }

    public function setTopicname($topicname){
        $this->topicname = $topicname;
    }


}