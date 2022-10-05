<?php

namespace App\Controllers;
use App\Models\replies;


class RepliesController extends \QueryBuilder
{
    protected $query;

    public function __construct(){
        $this->query = new \QueryBuilder();
    }

    public function addReplay(replies $replies){
        $topic_subject= $replies->getReplytopic();
        $sql = "SELECT topic_id from topics WHERE topic_subject = '$topic_subject'";
        $topic_id = $this->query->find($sql);
        $topic_id = $topic_id->fetch();

        $data = [
            'reply_content'=> $replies->getReplycontent(),
            'reply_topic' => $topic_id['topic_id'],
            'reply_by' => $_SESSION['id']
        ];

        $sql = "INSERT INTO replies (reply_content,reply_topic,reply_by) VALUES (:reply_content, :reply_topic, :reply_by)";

        return $this->query->insertData($sql,$data);

    }

    public function getReplies($topic){
        $sql = "SELECT topic_id FROM topics WHERE topic_subject = '$topic'";
        $id = $this->query->find($sql);
        $id = $id->fetch();
        $id =  $id['topic_id'] ;
        $sql = "SELECT * FROM replies WHERE reply_topic = '$id'";
        $results = $this->query->find($sql);
        $i=0;
        $replies=[];
        while ($row = $results->fetch()){
            $replies[$i] = new \stdClass();
            $replies[$i]->reply_id = $row['reply_id'];
            $replies[$i]->reply_content = $row['reply_content'];
            $replies[$i]->reply_date = $row['reply_date'];
            $addby=$row['reply_by'];
            $sql = "SELECT username FROM users WHERE id ='$addby'";
            $addby = $this->query->find($sql);
            $addby = $addby->fetch();
            $replies[$i]->add_by = $addby['username'];

            if(isset($_SESSION['user'])) {
                $addbycheck = $_SESSION['user'];
                if (strcmp($addby['username'],$_SESSION['user'])) {
                    $replies[$i]->is_user = false;
                } else {
                    $replies[$i]->is_user = true;

                }
            }
            else {
                $replies[$i]->is_user = false;

            }
            $i++;
        }


        return $replies;
    }

    public function deleteReplay($id){
        if(isset($_SESSION['id']) ){
            $user_id = $_SESSION['id'];
        }
        $data = [
            'id' => $id,
            'user_id' => $user_id
        ];
        $sql = "DELETE FROM replies WHERE reply_id = :id AND reply_by = :user_id";
        return $this->query->deleteData($sql,$data);

    }

}