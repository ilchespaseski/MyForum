<?php
class PageController
{

    public static function index(): void
    {
        /* if(!isset($_SESSION["iflogedin"]) || $_SESSION["iflogedin"] !== true){
            include 'C:\xampp\htdocs\MyForum\app\Views\login.php';

        }else {

        }
        */
include_once $_SERVER["DOCUMENT_ROOT"] . '/app/Views/home.php';
}

    public static function login(): void
    {
        include_once $_SERVER["DOCUMENT_ROOT"] . '/app/Views/login.php';
    }
    public static function register(): void
    {
        include_once $_SERVER["DOCUMENT_ROOT"] . '/app/Views/register.php';
    }

    public static function posts(): void
    {
        include_once $_SERVER["DOCUMENT_ROOT"] . '/app/Views/posts.php';
    }
    public static function topics(): void
    {
        include_once $_SERVER["DOCUMENT_ROOT"] . '/app/Views/topics.php';
    }
    public static function replies(): void
    {
        include_once $_SERVER["DOCUMENT_ROOT"] . '/app/Views/replies.php';
    }
    public static function notFound(): void
    {
        include_once $_SERVER["DOCUMENT_ROOT"] . '/app/Views/404.php';
    }
};