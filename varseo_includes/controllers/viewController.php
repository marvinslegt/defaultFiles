<?php
/**
 * Created by PhpStorm.
 * User: marvinslegt
 * Date: 23/05/16
 * Time: 14:41
 */
Class viewController{
    public static function returnView()
    {
        if (empty($_SESSION['user'])){
            header('location: login.php');
        }
        $auth = new AuthModel;
        $token = $auth->getTokenInformation($_SESSION['user']['username']);

        if ($token != $_SESSION['user']['token']){
            header('location: login.php');
        }
    }
}