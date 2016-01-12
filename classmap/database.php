<?php
require_once(dirname(__FILE__).'/../vendor/autoload.php');//autoload packages

class Database{
 
    public $conn;

    public function __construct(){
        return $this->getConnection();
    }
 
    // get the database connection
    public function getConnection(){

    	$dotenv = new Dotenv\Dotenv(__DIR__.'/..');
		$dotenv->load();

        //requiring configs
        $dotenv->required(['DB_HOST', 'DB_DATABASE', 'DB_USERNAME', 'DB_PASSWORD','SITE_URL']);

		$host = getenv('DB_HOST');
		$db_name = getenv('DB_DATABASE');
		$username = getenv('DB_USERNAME');
		$password = getenv('DB_PASSWORD');
 
        $this->conn = null;
 
        try{
            $this->conn = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username, $password);
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->conn;
    }
}