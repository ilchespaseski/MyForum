<?php

// namespace App\Controllers;
include_once $_SERVER["DOCUMENT_ROOT"] . '/config/autoload.php';
use App\Models\Topics;
class TopicsController extends \QueryBuilder
{

    public function AddTopic(Topics $topics){
        $catname = $topics->getCategory();
        $sql = "SELECT cat_id FROM categories WHERE cat_name ='$catname'";
        $id = $this->find($sql);
        $id = $id->fetch();
        $data = [
            'topic_subject' => $topics->getTopicname(),
            'cat_id' => $id['cat_id'],
            'add_by' => $topics->getAuthor()
        ];
        $sql = "INSERT INTO topics (topic_subject, cat_id, add_by) VALUES (:topic_subject, :cat_id, :add_by)";

        return $this->insertData($sql,$data);

    }

    public function getTopics($category){
        $sql = "SELECT cat_id FROM categories WHERE cat_name = '$category'";
        $id = $this->find($sql);
        $id = $id->fetch();
       $id =  $id['cat_id'] ;
        $sql = "SELECT * FROM topics WHERE cat_id = '$id'";
        $results = $this->find($sql);
        $i=0;
        $topics=[];
        while ($row = $results->fetch()){
            $topics[$i] = new \stdClass();
            $topics[$i]->topic_id = $row['topic_id'];
            $topics[$i]->topic_subject = $row['topic_subject'];
            $topics[$i]->topic_date = $row['topic_date'];
            $addby=$row['add_by'];
            $sql = "SELECT username FROM users WHERE id ='$addby'";
            $addby = $this->find($sql);
            $addby = $addby->fetch();
            $topics[$i]->add_by = $addby['username'];

            if(isset($_SESSION['user'])) {
                $addbycheck = $_SESSION['user'];
                if (strcmp($addby['username'],$_SESSION['user'])) {
                    $topics[$i]->is_user = false;
                } else {
                    $topics[$i]->is_user = true;

                }
            }
            else {
                $topics[$i]->is_user = false;

            }
            $i++;
        }

        return $topics;
    }

    public function deleteTopic($id){
        if(isset($_SESSION['id']) ){
            $user_id = $_SESSION['id'];
        }
        $data = [
          'id' => $id,
          'user_id' => $user_id
        ];
        $sql = "DELETE FROM topics WHERE topic_id = :id AND add_by = :user_id";
        return $this->deleteData($sql,$data);

    }

}