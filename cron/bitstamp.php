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


$mysqli = new mysqli("server", "user", "password$", "database");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
}

$sql = "INSERT INTO Bitstamp  (price, bid, ask, volume)
    VALUES (" . $last . ", " . $bid . ", " . $ask . ", " . $volume . ");";

$res = $mysqli->query($sql);

$data = file_get_contents('https://www.bitstamp.net/api/order_book/');

$data = json_decode($data, true);


foreach ($data['asks'] as &$ask) {

    $price = $ask[0];
    $amount = $ask[1];

    $sql = "INSERT INTO BitstampBook  (price, amount, type)
        VALUES (" . $price . ", " . $amount . ", 'ask');";

    $res = $mysqli->query($sql);
}

foreach ($data['bids'] as &$bid) {

    $price = $bid[0];
    $amount = $bid[1];

    $sql = "INSERT INTO BitstampBook  (price, amount, type)
        VALUES (" . $price . ", " . $amount . ", 'bid');";

    $res = $mysqli->query($sql);
}
?>
