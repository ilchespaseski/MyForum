<?php

namespace App\Controllers;

class CategoryController extends \QueryBuilder
{
    protected $query;
        public function __construct()
        {
            $this->query = new \QueryBuilder();
        }

        public function getCategories(){
            $sql = "SELECT * FROM categories";

            $result= $this->query->find($sql);
            $i=0;
            while($row = $result->fetch() ){
                $categories[$i] = new \stdClass();
                $categories[$i]->cat_id = $row["cat_id"];
                $categories[$i]->cat_name = $row["cat_name"];
                $categories[$i]->cat_description = $row["cat_description"];
                $i++;
            }
            return $categories;
        }
}