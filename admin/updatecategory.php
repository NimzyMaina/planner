<?php
/**
 * Created by PhpStorm.
 * User: nimzy
 * Date: 1/21/2016
 * Time: 12:09 AM
 */
require_once(dirname(__FILE__).'/../vendor/autoload.php');//autoload packages

$db = new Database();
$category = new Category($db->conn);

if(!empty($_POST)) {
    //print_r($_POST);exit;
    foreach ($_POST as $field_name => $val)
    {
//        //clean post values
        $field_userid = strip_tags(trim($field_name));
        $val = strip_tags(trim($val));
//
//        //from the fieldname:user_id we need to get user_id
        $split_data = explode(':', $field_userid);
        $category_id = $split_data[1];
        $field_name = $split_data[0];
        $category->update($field_name, $val, $category_id);
        echo "Field Succefully Updated!!";
    }

} else {
    echo "Invalid Requests";
}
