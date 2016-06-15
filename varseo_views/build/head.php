<?php
include('varseo_includes/autoloader.php');
/*
 * Return view with security checks
 */
viewController::returnView();

//Get current file name for active class
$file = basename($_SERVER['PHP_SELF'] , '.php');
?>