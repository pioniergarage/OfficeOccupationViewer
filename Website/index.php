
<html>
	<head>
	<title>Ist jemand im Launchpad?</title>
	<link rel="stylesheet" type="text/css" href="style-toggle-button.css"/>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	</head>
	<body>
    <h1>Ist das launchpad offen?</h1>
    <br>
		<div>
			<?php
		  // This fancy PHP script is updating the door state

		    $host="127.0.0.1";
		    $user="test";
		    $password="test2";
		    $database="door";

		    $link = mysql_connect($host, $user, $password);

		    $query = "SELECT stat FROM DoorStatus WHERE id = 1;";

		    // Connect to the database
		    if (!mysql_select_db($database, $link)) {
		        echo "Could not select database";
		        exit;
		    }

		    $result = mysql_query($query, $link);

		    if (!$result) { // check for errors.
		        echo "Could not run query: " . mysql_error();
		    }
		    else{
		      $row = mysql_fetch_row($result);
		      if($row[0] == 1){
		        echo '<h1>Ja</h1> <br><br> <img type="image" src="http://openclipart.org/image/320px/svg_to_png/66421/traffic-semaphore-silhouette-green.png">';
		      }
		      else {
		        echo '<h1>Nein</h1>  <br><br><img type="image" src="http://openclipart.org/image/320px/svg_to_png/66427/traffic-semaphore-silhouette-red.png">';
		      }
		    }

			?>
	</div>
	<br> <br>

	<h1>Change state:</h1>
	<br>
	<button type="button">Click me to change state</button>
	<p></p>
	<script type="text/javascript">
	    $(document).ready(function(){
	        $("button").click(function(){
	            $.ajax({
	                type: 'POST',
	                url: 'changeState.php?door=toggle',
	                success: function(data) {
	                }
	            });
							location.reload();
	   });
	});
	</script>

 </body>
</html>
