<?php
    // Insert your configuration here
    $host="127.0.0.1";
    $user="test";
    $password="test2";
    $database="door";
    $query = "SELECT stat FROM DoorStatus WHERE id =1;";

    $link = mysql_connect($host, $user, $password);

    // Connect to the database
    if (!mysql_select_db($database, $link)) {
        echo "Could not select database";
        exit;
    }

    // Performe querry
    $result = mysql_query($query, $link);
    if (!$result) { // check for errors.
        echo 'Could not run query: ' . mysql_error();
    } else {
      $row = mysql_fetch_row($result);
      if($row[0] == 1) {
          echo("1");
      }
      else {
          echo("0");
      }
  } ?>
