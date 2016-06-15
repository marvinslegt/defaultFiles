<?php
/**
 * Created by PhpStorm.
 * User: marvinslegt
 * Date: 23/05/16
 * Time: 19:06
 */
Class UserController{
    public static function UserDetails()
    {
        $user = new UserModel;
        return $user->getAllDetails($_SESSION['user']['username'],$_SESSION['user']['token']);
    }
}