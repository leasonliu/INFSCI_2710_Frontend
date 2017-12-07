<?php
/**
* User markers
* Have this because of not ingergate with Laravel
*/

if(!session_start()) {
    die('System fatal error!');
}

if(!isset($_POST['login_status'])) die();

if($_POST['login_status'] != 20098) die();

$_SESSION["login"] = "ok";
$_SESSION["role"] = $_POST['is_admin']==1 ? 1 : 2;
$_SESSION["userid"] = $_POST['uid'];
$_SESSION["nickname"] = $_POST['nick'];
$_SESSION["firstname"] = $_POST['fn'];
$_SESSION["lastname"] = $_POST['ln'];
$_SESSION["gender"] = $_POST['s'];
$_SESSION["dob"] = $_POST['dob'];
$_SESSION["email"] = $_POST['m'];
$_SESSION["whatsup"] = $_POST['w'];

echo 'GOOD';
