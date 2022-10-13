<?php


class CategoryController extends \QueryBuilder
{


        public function getCategories(){
            $sql = "SELECT * FROM categories";

            $result= $this->find($sql);


            $i=0;

            while($row = $result->fetch() ){
                $categories[$i] = new \stdClass();
                $categories[$i]->cat_id = $row["cat_id"];
                $categories[$i]->cat_name = $row["cat_name"];
                $categories[$i]->cat_description = $row["cat_description"];
                $cat_id = $row["cat_id"];
                $sql = " SELECT COUNT(*) FROM topics WHERE cat_id = '$cat_id'";
                $cnttopics = $this->find($sql);
                $cnttopics=$cnttopics->fetch();
                $categories[$i]->cat_topics = $cnttopics["0"];
                $i++;
            }
            return $categories;
        }
}