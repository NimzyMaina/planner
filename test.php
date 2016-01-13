<?php require 'vendor/autoload.php';

		// $host = "localhost";
		// $db_name = "planner";
		// $username = "root";
		// $password = "";
 
  //       try{
  //           $conn = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username, $password);
  //           echo "connection established";
  //       }catch(PDOException $exception){
  //           echo "Connection error: " . $exception->getMessage();
  //       }

/*if(isset($_GET['cmd'])){

    exec('git remote -v', $output, $return);
    
    foreach ($output as $value) {
    	echo $value ."\n";
    }
}else{
	echo "No Command Issued";
} */

//sendmail('kmaina@clemcreativity.com','Kevin Maina','Test','Just testing');
sms('+254724844946','The Planner');