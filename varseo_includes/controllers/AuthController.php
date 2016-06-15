<?php
class AuthController {
    public static function signIn()
    {
        $auth = new AuthModel;
        $bcrypt = new Bcrypt(15);

        if ($bcrypt->verify(Input::get('password'), $auth->Auth(Input::get('username'))) == true) {
            if (FailedLoginController::LoginThrottle() > 10) {
                echo "
                    <script src='varseo_assets/vendor/jquery.min.js'></script>
                    <script src='varseo_assets/js/sweetalert.js'></script>
                    <script>$( document ).ready(function() {
                        swal({ 
                                type: \"warning\", 
                                title: \"You have to many failed login attempts. You need to wait 15 minutes before signing in again.\",
                                confirmButtonColor: \"red\" 
                            });
                    });</script>
                ";
                //die('You need to wait 15 minutes before logging in again.');
            } else {
                unset($_SESSION['fail']);
                $generator = new RandomStringGenerator;
                $tokenLength = 32;
                $token = $generator->generate($tokenLength);

                //set token
                $auth->setToken($token, Input::get('username'));

                //check if token is equal to our new generated token
                if ($auth->getTokenInformation(Input::get('username')) == $token) {
                    //if equal continue..
                    $_SESSION['user']['token'] = $token;
                    $_SESSION['user']['logged_in'] = true;
                    $_SESSION['user']['username'] = Input::get('username');
                    header('Location: index.php');
                }
            }
        }else {
            FailedLoginController::InsertFailedAttempt();
            if (FailedLoginController::LoginThrottle() > 10){
                echo "
                    <script src='varseo_assets/vendor/jquery.min.js'></script>
                    <script src='varseo_assets/js/sweetalert.js'></script>
                    <script>$( document ).ready(function() {
                        swal({ 
                                title: \"You have to many failed login attempts. You need to wait 15 minutes before signing in again.\",
                                confirmButtonColor: \"#039BE5\" 
                            });
                    });</script>
                ";
                //die('You need to wait 15 minutes before logging in again.');
            }
            $_SESSION['fail'] = true;
            header('refresh: login.php');
        }
    }
}
?>