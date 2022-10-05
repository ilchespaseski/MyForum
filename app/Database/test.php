<?php
require_once 'Database.php';

include_once 'C:\xampp\htdocs\MyForum\app\Controllers\QueryBuilder.php';
$query = new QueryBuilder();

$sql = "SELECT * FROM categories";

$result = $query->find($sql);

while($row = $result->fetch() ){
printf ("%s (%s)\n", $row["cat_name"], $row["cat_description"]);
    }