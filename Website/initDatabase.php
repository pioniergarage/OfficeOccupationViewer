<?
$host="127.0.0.1";
$user="test";
$password="test2";
$database="door";

$link = mysql_connect($host, $user, $password);
$query="CREATE TABLE DoorStatus (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            stat TINYINT(1) NOT NULL);";

// Connect to the database
if (!mysql_select_db($database, $link)) {
    echo 'Could not select database';
    exit;
}

$res = mysql_query($query, $link);
if($res){
  $query = "INSERT INTO DoorStatus VALUES (null, 0);";
  mysql_query($query, $link);
  echo "<h1>done<h1>";
}
else {
  die('Invalid query: ' . mysql_error());
}
mysql_close();
echo "<h1>Created DoorStatus Table</h1>";

?>
