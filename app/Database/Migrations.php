<?php
require_once 'Database.php';
include_once 'C:\xampp\htdocs\MyForum\app\Controllers\QueryBuilder.php';
$query = new QueryBuilder();

//$users = "CREATE TABLE IF NOT EXISTS Users (
//  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//  username VARCHAR(30) NOT NULL,
//  password CHAR(60) NOT NULL,
//  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
//  )";
//
//echo $query->createTable($users);
//
//$categories = "CREATE TABLE IF NOT EXISTS Categories (
//    cat_id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//    cat_name VARCHAR(255) NOT NULL,
//    cat_description VARCHAR (255) NOT NULL
//)";
//
//$query->createTable($categories);
//
//$topics = "CREATE TABLE IF NOT EXISTS Topics (
//    topic_id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//    topic_subject VARCHAR(255) NOT NULL,
//    topic_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
//    cat_id INT NOT NULL REFERENCES Categories(cat_id)
//    ON UPDATE CASCADE
//    ON DELETE CASCADE,
//    add_by INT NOT NULL REFERENCES Users(id)
//    ON UPDATE CASCADE
//    ON DELETE CASCADE
//)";
//$query->createTable($topics);

$replies = "CREATE TABLE IF NOT EXISTS Replies(
   reply_id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    reply_content TEXT NOT NULL DEFAULT '',
    reply_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    reply_topic INT(8) UNSIGNED,
    FOREIGN KEY (reply_topic)
    REFERENCES Topics(topic_id) ON UPDATE CASCADE ON DELETE CASCADE,
    reply_by INT NOT NULL REFERENCES Users(id) ON UPDATE CASCADE ON DELETE CASCADE
)";

$query->createTable($replies);

// $sql = "INSERT INTO Categories (cat_name,cat_description) VALUES (:cat_name,:cat_description)";
//$data = [
//    'cat_name' => 'Junk',
//    'cat_description' => 'You can use this as a sandbox for composer changes, but keep in mind all topics in this category will be regularly deleted'
//];
//$query->insertData($sql,$data);
//$sql = "INSERT INTO Categories (cat_name,cat_description) VALUES (:cat_name,:cat_description)";
//$data = [
//    'cat_name' => 'Movies',
//    'cat_description' => 'Topics about movies and television, including reviews, news, commentary and other discussion'
//];
//$query->insertData($sql,$data);
//
//$sql = "INSERT INTO Categories (cat_name,cat_description) VALUES (:cat_name,:cat_description)";
//$data = [
//    'cat_name' => 'Tech',
//    'cat_description' => 'Topics about technology: computers, gadges, phones, cameras, the Intertubes, or any other IT aspects of the world'
//];
//$query->insertData($sql,$data);
//$sql = "INSERT INTO Categories (cat_name,cat_description) VALUES (:cat_name,:cat_description)";
//$data = [
//    'cat_name' => 'Discourse',
//    'cat_description' => 'Topics about technology: computer, gadgets, phones, cameras, the intertubes, or any other IT aspects of the world'
//];
//$query->insertData($sql,$data);
//
//$sql = "INSERT INTO Categories (cat_name,cat_description) VALUES (:cat_name,:cat_description)";
//$data = [
//    'cat_name' => 'Videos',
//    'cat_description' => 'Topics about any aspect of online vide. Discussions about movies and TV should be in the Movies category'
//];
//$query->insertData($sql,$data);
//$data = [
//    'cat_name' => 'General',
//    'cat_description' => 'General discussion, topics not specifically fitting any other category. If you are not sure what to pick, either select no category at all, or use this one'
//];
//$query->insertData($sql,$data);
//$data = [
//    'cat_name' => 'Gaming',
//    'cat_description' => 'Topics about gaming of any kind: videogames, board games, card games, role playing games, you name it'
//];
//$query->insertData($sql,$data);
//$data = [
//    'cat_name' => 'Sports',
//    'cat_description' => 'Topics about the wide wide world of sports, professional or amateur, real or fantasy'
//];
//$query->insertData($sql,$data);
//$data = [
//    'cat_name' => 'School',
//    'cat_description' => 'Topics about school, learning, and general education. How you can get your pudding if you don\'t eat any meat'
//];
//$query->insertData($sql,$data);
//
