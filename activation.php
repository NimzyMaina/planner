<?php require 'vendor/autoload.php';

    $db = new Database();
    $user = new User($db->conn);

if(isset($_GET['code'])){
    if($user->activate($_GET['code'])){
        echo $url = getenv('SITE_URL')."/login.php";exit;
        header ("Location: $url");
    }
}

echo $url = getenv('SITE_URL')."/register.php";exit;
header ("Location: $url");