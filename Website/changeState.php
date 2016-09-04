<html>
    <head>
        <title>Why are you here?</title>
    </head>
    <body>
        <h1>Nothing to see here!</h1>
    <br>
        <?php
        // This fancy PHP script is updating the door state in the database

        // Change State of the door according to boolean $state
        function changeState($state){
            // Insert your configuration here
            $host="127.0.0.1";
            $user="test";
            $password="test2";
            $database="door";
            $queryOpen = "UPDATE DoorStatus SET stat = 1 WHERE id = 1;";
            $queryClosed = "UPDATE DoorStatus SET stat = 0 WHERE id = 1;";

            // Connect to MySQL server
            $link = mysql_connect($host, $user, $password);

            // Connect to the database
            if (!mysql_select_db($database, $link)) {
                echo 'Could not select database';
                exit;
            }

                // Performe querry according to state (set office as open or closed)
            if($state){
              $res = mysql_query($queryOpen, $link);
            }
            else{
              $res = mysql_query($queryClosed, $link);
            }
        }

        // Toggle State of the door
        function toggle(){

        // Insert your configuration here
        $host="127.0.0.1";
        $user="test";
        $password="test2";
        $database="door";

        $query = "SELECT stat FROM DoorStatus WHERE id = 1;";
        $queryOpen = "UPDATE DoorStatus SET stat = 1 WHERE id = 1;";
        $queryClosed = "UPDATE DoorStatus SET stat = 0 WHERE id = 1;";

        // Connect to MySQL server
        $link = mysql_connect($host, $user, $password);

        // Connect to the database
        if (!mysql_select_db($database, $link)) {
            echo 'Could not select database';
            exit;
        }

        // Performe querry
        $result = mysql_query($query, $link);

        if (!$result) { // check for errors.
            echo "Could not run query: " . mysql_error();
        }
        else{
            // if door is closed change to open and if closed do it the other way
            $row = mysql_fetch_row($result);
            if($row[0] == 0){
                $res = mysql_query($queryOpen, $link);
            }
            else {
                $res = mysql_query($queryClosed, $link);
            }
        }
    }

    // Update door state according to the argument
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
