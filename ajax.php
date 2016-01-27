<?php require 'vendor/autoload.php';

    $db = new Database();
    $user = new User($db->conn);
    $vendor = new Vendor($db->conn);
    $item = new Item($db->conn);

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

        case 'vendor_email';
            if($vendor->check_email($_POST['email'])){
                $isAvailable = true;
            }
            break;

        case 'delete_item';
            if($item->delete($_POST['object_id'])){
                $isAvailable = true;
            }
            break;

        case 'delete_user';
            if($user->delete($_POST['object_id'])){
                $isAvailable = true;
            }
            break;

        case 'delete_vendor';
            if($vendor->delete($_POST['object_id'])){
                $isAvailable = true;
            }
            break;


    }

    echo json_encode(array(
        'valid' => $isAvailable,
    ));