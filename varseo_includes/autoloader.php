<?php
session_start();
//ini_set('display_startup_errors',1);
//ini_set('display_errors',1);
//error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

include('Connection.php');
include('Input.php');

spl_autoload_register(function ($class) {
    if(file_exists(__DIR__ . '/models/'. $class . '.php'))	{
        include 'models/'. $class . '.php';
    } else if(file_exists(__DIR__ . '/controllers/'. $class . '.php')) {
        include 'controllers/'. $class . '.php';
    }
});

if(!isset($_SESSION['message'])) {
    $_SESSION['message'] = "";
}


if(!isset($_SESSION['alert'])) {
    $_SESSION['alert'] = "";
}

//Post reciever
include('posts/Post.php');
