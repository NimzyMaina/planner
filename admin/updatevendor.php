<?php
require_once(dirname(__FILE__).'/../vendor/autoload.php');//autoload packages

$db = new Database();
$vendor = new Vendor($db->conn);

if(!empty($_POST)) {
    //print_r($_POST);exit;
    foreach ($_POST as $field_name => $val)
    {
//        //clean post values
        $field_vendorid = strip_tags(trim($field_name));
        $val = strip_tags(trim($val));
//
//        //from the fieldname:vendor_id we need to get vendor_id
        $split_data = explode(':', $field_vendorid);
        $vendor_id = $split_data[1];
        $field_name = $split_data[0];
        $vendor->update($field_name, $val, $vendor_id);
        echo "Field Succefully Updated!!";
    }

} else {
    echo "Invalid Requests";
}