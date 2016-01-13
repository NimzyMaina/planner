<?php

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

    exec("git remote -v", $output, $return);
    echo "<pre>";
    echo "Dir returned $return, and output:\n";
    var_dump($output);
