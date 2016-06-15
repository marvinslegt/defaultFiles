<?php
$_SESSION['alert'] = false;
$_SESSION['message'] = '';

/*
 * Authenticate
 */
if (Input::has('signIn')) AuthController::SignIn();