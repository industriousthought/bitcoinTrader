<?php 

$mysqli = new mysqli("server", "user", "password", "database");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
}

$sql = "CREATE TABLE twitter (

	rId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	timestamp TIMESTAMP,
	tweet VARCHAR(140),
	keyword VARCHAR(60),
	sentiment FLOAT,
	locale VARCHAR(30),
	language VARCHAR(30),
	username VARCHAR(30),
	klout INT,
	numberFollowers INT,
	numberRetweets INT,
	numberFavorites INT,


)";

$res = $mysqli->query($sql);

?>
