<?php

use App\Controllers\CategoryController;
use App\Controllers\UsersController;
use App\Models\User;
use App\Models\Topics;
use App\Models\replies;

use App\Controllers\TopicsController;
use App\Controllers\RepliesController;

include $_SERVER["DOCUMENT_ROOT"] . '/MyForum/config/autoload.php';
include 'Routertest.php';
//$router = new Router();

$pageContr = new PageController();
$user = new UsersController();
$categoriesContr = new CategoryController();
$tpccontroller = new TopicsController();
$repliescontroller = new RepliesController();

get('/MyForum',function () use($pageContr){
    $pageContr->index();

});
get('/MyForum/topics/$cat-name', function ($catname) use ($pageContr) {
    $pageContr->topics();
});

get('/myforum/replies/$topic-name', function ($topic_name) use ($pageContr) {
    $pageContr->replies();
});
get('/MyForum/login',function () use($pageContr){
    $pageContr->login();
});
get('/MyForum/register',function () use($pageContr){
    $pageContr->register();
});
post("/MyForum/getcategories", function () use ($categoriesContr) {
    $result =$categoriesContr->getCategories();
    echo json_encode($result);
});
post("/MyForum/register", function () use ($user) {
    $result = $user->CreateAccount(new User($_POST['username'], $_POST['password']));
    echo json_encode($result);
});

post("/MyForum/login", function () use ($user) {
    $result = $user->Login($_POST['username'],$_POST['password']);
    echo json_encode($result);

});

post("/MyForum/logout", function () use ($user) {
    $result = $user->Logout();
    echo json_encode($result);
});
post("/myforum/addtopic", function () use ($tpccontroller,$repliescontroller) {
        $result = $tpccontroller->AddTopic(new Topics($_POST['tpcname'], $_POST['category']));
        $addreplay = $repliescontroller->addReplay(new replies($_POST['firstreplay'],$_POST['tpcname'],$_SESSION['id']));
        if($result & $addreplay) {
            echo json_encode(true);
        }else{
            echo json_encode(false);
        }
});

post("/myforum/addreply", function () use ($repliescontroller) {
    session_start();
        $addreplay = $repliescontroller->addReplay(new replies($_POST['reply'],$_POST['topic'],$_SESSION['id']));
        echo json_encode($addreplay);
});

post("/myforum/gettopics", function () use ($tpccontroller){
    session_start();
    $catname = $_POST['category'];
  $results = $tpccontroller->getTopics($catname);
  echo json_encode($results);
});
post("/myforum/getreplies", function () use ($repliescontroller){
    session_start();
  $results = $repliescontroller->getReplies($_POST['topic']);
    echo json_encode($results);
});

post("/myforum/deletetopic", function () use ($tpccontroller){
    session_start();
  $results = $tpccontroller->deleteTopic($_POST['id']);
    echo json_encode($results);
});
post("/myforum/deletereplay", function () use ($repliescontroller){
    session_start();
  $results = $repliescontroller->deleteReplay($_POST['id']);
    echo json_encode($results);
});




any('/404',function (){
    echo 'neabiva';
});
get('/login', $pageContr::login());

// $router->get('/', PageController::index());
//
// $router->get('/login', PageController::login());
//
//
//$router->get("/MyForum/login", function () use ($pageContr) {
//    $pageContr->login();
//});
//
//$router->get("/MyForum/register", function () use ($pageContr) {
//    $pageContr->register();
//});
//
//$router->get("/MyForum/posts", function () use ($pageContr) {
//    $pageContr->posts();
//});
//$router->get("/MyForum/topics", function () use ($pageContr) {
//
//    $pageContr->topics();
//});
//
//
//$router->post("/MyForum/register", function () use ($user) {
//    $result = $user->CreateAccount(new User($_POST['username'], $_POST['password']));
//    echo json_encode($result);
//});
//
//$router->post("/MyForum/login", function () use ($user) {
//    $result = $user->Login($_POST['username'],$_POST['password']);
//    echo json_encode($result);
//
//});
//
//$router->post("/MyForum/logout", function () use ($user) {
//    $result = $user->Logout();
//    echo json_encode($result);
//});
//$router->post("/MyForum/getcategories", function () use ($categoriesContr) {
//  $result =$categoriesContr->getCategories();
//  echo json_encode($result);
//});
//
//
//$router->addNotFoundHandler(function () use ($pageContr) {
//    $pageContr->notFound();
//});
//
//$router->run();

