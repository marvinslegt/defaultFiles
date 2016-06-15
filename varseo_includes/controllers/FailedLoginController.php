<?php
class FailedLoginController
{
    public static function LoginThrottle()
    {
        $failed = new FailedLogins;
        return $failed -> SelectCount(Input::get('username'));
    }

    public static function InsertFailedAttempt()
    {
        $failed = new FailedLogins;
        return $failed -> InsertFailedLoginAttempt($_SERVER['REMOTE_ADDR'],Input::get('username'));
    }
}