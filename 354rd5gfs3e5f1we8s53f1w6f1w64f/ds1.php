<?php header('Access-Control-Allow-Origin: *'); ?>
<?php

header('Content-Type: application/json');

//database
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'monex1754335');

//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
  die("Connection failed: " . $mysqli->error);
}

$mail = $_SESSION['login_type'];
//query to get data from the table
$query = sprintf("SELECT s.title, COUNT(a.survey_id) as taux FROM answers as a , survey_set as s where a.survey_id = s.id GROUP BY s.title");

//execute query
$result = $mysqli->query($query);

 
$data = array();
foreach ($result as $row) {
  $data[] = $row;
}


//free memory associated with result
$result->close();

//close connection
$mysqli->close();

//now print the data
print json_encode($data);
