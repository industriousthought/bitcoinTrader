<?php

$data = file_get_contents('https://www.bitstamp.net/api/ticker/');

$data = json_decode($data, true);

$high = $data['high'];
$last = $data['last'];
$timestamp = $data['timestamp'];
$bid = $data['bid'];
$ask = $data['ask'];
$low = $data['low'];
$volume = $data['volume'];


$mysqli = new mysqli("server", "user", "password", "database");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
}

$sql = "INSERT INTO Bitstamp  (price, bid, ask, volume)
    VALUES (" . $last . ", " . $bid . ", " . $ask . ", " . $volume . ");";

$res = $mysqli->query($sql);
?>
