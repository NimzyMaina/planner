<?php

class Vendor {
    private $conn;
    private $table_name = "vendors";

    public function __construct($db){
        $this->conn = $db;
    }


    function readAll(){
        $query = "SELECT id,name,email,phone,status,website,details
            FROM
                $this->table_name
            ORDER BY
                name ASC";

        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        return $stmt;
    }

    function update($field_name,$value,$id){
        $query = "UPDATE
                " . $this->table_name . "
            SET
                $field_name = '$value'
            WHERE
                id = $id";//exit;

        $stmt = $this->conn->prepare($query);

        // $stmt->bindParam(':value', $value);
        //$stmt->bindParam(':id', $id);

        // execute the query
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function countAll(){

        $query = "SELECT id FROM $this->table_name ";

        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        $num = $stmt->rowCount();

        return $num;
    }

}
