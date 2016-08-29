<?php
    // This file creates a proper table and initializes the first data

    // Insert your configuration here
    $host="127.0.0.1";
    $user="test";
    $password="test2";
    $database="door";
    $query="CREATE TABLE DoorStatus (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                stat TINYINT(1) NOT NULL);";

    // Connect to the mysql server
    $link = mysql_connect($host, $user, $password);

    // Connect to the database
    if (!mysql_select_db($database, $link)) {
        echo 'Could not select database';
        exit;
    }

    // Perforem query (create Table)
    $res = mysql_query($query, $link);
    // If query was successfully insert first value into the table
    if($res){
      $query = "INSERT INTO DoorStatus VALUES (null, 0);";
      mysql_query($query, $link);
      echo "<h1>done<h1>";
    }
    else {
      die('Invalid query: ' . mysql_error());
      exit;
    }

    // Everything has been created properly.
    echo "<h1>Created DoorStatus Table</h1>";
?>
