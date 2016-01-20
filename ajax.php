<?php require 'vendor/autoload.php';

    $db = new Database();
    $user = new User($db->conn);

    $isAvailable = false;

    if(!isset($_POST['type'])){
        echo json_encode(array(
            'valid' => $isAvailable,
        ));
        exit;
    }

    switch($_POST['type']){
        case 'email':
            if($user->check_email($_POST['email'])){
                $isAvailable = true;
            }
        break;

        case 'phone':
            if($user->check_phone($_POST['phone'])){
                $isAvailable = true;
            }
        break;
    }

    echo json_encode(array(
        'valid' => $isAvailable,
    ));