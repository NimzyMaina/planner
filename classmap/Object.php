<?php

/**
 * Created by PhpStorm.
 * User: nimzy
 * Date: 1/27/2016
 * Time: 7:01 PM
 */
abstract class Object
{
    private $conn;
    private $table_name;

    public $id;
    public $name;

    public function __construct($db){
        $this->conn = $db;
    }

    public function setDetails($db,$table){
    $this->conn = $db;
        $this->table_name = $table;
}

    public function delete($id){
        $query = "UPDATE
                " . $this->table_name . "
            SET
                status = 0
            WHERE
                id = $id";//exit;

        $stmt = $this->conn->prepare($query);

        if($stmt->execute()){
            return true;
        }else{
            $error= $stmt->errorInfo();
            echo $error[2];exit;
            return false;
        }
    }//delete

    function readAll(){
        $query = "SELECT *
            FROM
                $this->table_name
            ORDER BY
                name ASC";

        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        return $stmt;
    }//readAll

    public function countAll(){

        $query = "SELECT id FROM $this->table_name ";

        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        $num = $stmt->rowCount();

        return $num;
    }//countall

    public function hello (){
        return "hello for abstract";
    }



}