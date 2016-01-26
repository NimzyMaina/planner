<?php

class Vendor {
    private $conn;
    private $table_name = "vendors";

    public $name;
    public $email;
    public $website;
    public $phone;
    public $details;

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

    public function register(){
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    name = ?,email = ? , phone = ?, website = ?, details = ?,status = 1";

        $stmt = $this->conn->prepare($query);


        $stmt->bindParam(1, $this->name);
        $stmt->bindParam(2, $this->email);
        $stmt->bindParam(3, $this->phone);
        $stmt->bindParam(4, $this->website);
        $stmt->bindParam(5, $this->details);

        //print_r($stmt);exit;
        if($stmt->execute()){
            return true;
        }
        return false;
    }

    function update($field_name,$value,$id){
        $query = "UPDATE
                " . $this->table_name . "
            SET
                $field_name = \"$value\"
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

    public function check_email ($email){
        $query = "SELECT * FROM $this->table_name WHERE email = '$email' ";

        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        $num = $stmt->rowCount();

        if($num > 0){
            return false;
        }
        return true;
    }

}
