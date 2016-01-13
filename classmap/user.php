<?php
class User {
    private $conn;
    private $table_name = "users";

    public $email;
    public $password;
    public $first_name;
    public $last_name;
    public $phone;
    public $role;

    public function __construct($db){
        $this->conn = $db;
    }

    public function register(){
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    first_name = ?,last_name = ?,email = ? , phone = ?, password = ?, role = ?";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->first_name);
        $stmt->bindParam(2, $this->last_name);
        $stmt->bindParam(3, $this->email);
        $stmt->bindParam(4, $this->phone);
        $stmt->bindParam(5, sha1($this->password));
        $stmt->bindParam(6, $this->role);

        if($stmt->execute()){
            return true;
        }
        return false;
    }

    public function login(){
        $query = "SELECT * FROM $this->table_name WHERE email='".sha1($this->password)."' ";

        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        $num = $stmt->rowCount();

        if($num != 0 && $num < 2){
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);

                if($this->email == $email && sha1($this->password) ==  $password){
                    session_start();
                    $_SESSION['full_name'] = $first_name ." ". $last_name;
                    $_SESSION['logged_in'] = true;
                    $_SESSION['role'] = $role;
                    return true;
                }
                return false;

            }//while
        }

    }
}