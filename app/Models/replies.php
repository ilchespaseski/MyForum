<?php

namespace App\Models;

class replies
{
    protected $reply_content;
    protected $reply_topic;
    protected $reply_by;


    public function __construct($reply_content,$reply_topic, $reply_by){
        $this->reply_content = $reply_content;
        $this->reply_topic = $reply_topic;
        $this->reply_by = $reply_by;
    }

    public function getReplycontent(){
        return $this->reply_content;
    }

    public function getReplytopic(){
        return $this->reply_topic;
    }

    public function getReplyby(){
        return $this->reply_by;
    }


}