<?php
class Category{
 
    // database connection and table name
    private $conn;
    private $table_name = "categories";
 
    // object properties
    public $id;
    public $name;
 
    public function __construct($db){
        $this->conn = $db;
    }
 
    // used by select drop-down list
    function read(){
        //select all data
        $query = "SELECT
                    *
                FROM
                     $this->table_name";
 
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
 
        return $stmt;
    }
	// used to read category name by its ID
function readName(){
     
    $query = "SELECT name FROM " . $this->table_name . " WHERE id = ? limit 0,1";
 
    $stmt = $this->conn->prepare( $query );
    $stmt->bindParam(1, $this->id);
    $stmt->execute();
 
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
    $this->name = $row['name'];
}

    function readAll(){
        $query = "SELECT *
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

    public function toogle($id,$status){
        $query = "UPDATE
                " . $this->table_name . "
            SET
                status = $status
            WHERE
                id = $id";//exit;

        $stmt = $this->conn->prepare($query);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function add(){
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    name = ?, status = ?";

        $stmt = $this->conn->prepare($query);


        $stmt->bindParam(1, $this->name);
        $stmt->bindParam(2, $this->status);


        //print_r($stmt);exit;
        if($stmt->execute()){
            return true;
        }
        return false;
    }//add

}
?>