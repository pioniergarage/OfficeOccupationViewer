<html>
	<head>
	<title>Why are you here?</title>
	</head>
	<body>
    <h1>Nothing to see here!</h1>
    <br>

	<?php
  // This fancy PHP script is updating the door state

  // Change State of the door
  function changeState($state){
    $host="127.0.0.1";
    $user="test";
    $password="test2";
    $database="door";

    $link = mysql_connect($host, $user, $password);
    $queryOpen = "UPDATE DoorStatus SET stat = 1 WHERE id = 1;";

    $queryClosed = "UPDATE DoorStatus SET stat = 0 WHERE id = 1;";

    // Connect to the database
    if (!mysql_select_db($database, $link)) {
        echo 'Could not select database';
        exit;
    }

    if($state){
      $res = mysql_query($queryOpen, $link);
    }
    else{
      $res = mysql_query($queryClosed, $link);
    }
  }

	// Toggle State of the door
	function toggle(){
    $host="127.0.0.1";
    $user="test";
    $password="test2";
    $database="door";

    $link = mysql_connect($host, $user, $password);

		$query = "SELECT stat FROM DoorStatus WHERE id = 1;";
    $queryOpen = "UPDATE DoorStatus SET stat = 1 WHERE id = 1;";
    $queryClosed = "UPDATE DoorStatus SET stat = 0 WHERE id = 1;";

    // Connect to the database
    if (!mysql_select_db($database, $link)) {
        echo 'Could not select database';
        exit;
    }

		$result = mysql_query($query, $link);

		if (!$result) { // check for errors.
				echo "Could not run query: " . mysql_error();
		}
		else{
			$row = mysql_fetch_row($result);
			if($row[0] == 0){
				$res = mysql_query($queryOpen, $link);
			}
			else {
				$res = mysql_query($queryClosed, $link);
			}
		}
  }

	// Update door state
  if($_GET["door"] == "open"){
  	// change to open
    changeState(true);
  }
  else if($_GET["door"] == "closed"){
    // change to closed
    changeState(false);
  }
	else if($_GET["door"] == "toggle"){
		toggle();
	}

	?>

 </body>
</html>
