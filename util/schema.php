
<?php

$exchanges = array(

	//"BitInstant",
	"Bitstamp"
	//"BTCChina",
	//"BTCe",
	//"BTCXIndia",
	//"Buttercoin",
	//"CloudHashing",
	//"Coinbase",
	//"CoinCorner",
	//"Coinfloor",
	//"Coinsecure",
	//"Dwolla",
	//"Gatecoin",
	//"Ghashio",
	//"Huobi",
	//"ItBit",
	//"LakeBTC",
	//"MtGox",
	//"OKCoin"
);


$mysqli = new mysqli("server", "user", "password", "database");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
}

foreach ($exchanges as &$exchange) {

	$sql = "CREATE TABLE " . $exchange . " (
		rId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
		timestamp TIMESTAMP,
		price INT NOT NULL,
		ask INT,
		bid INT,
		volume INT,
		currency VARCHAR(30) DEFAULT 'USD'

	)";

	$res = $mysqli->query($sql);

	$sql = "CREATE TABLE " . $exchange . "Tradebook (

		
		rId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
		timestamp TIMESTAMP,
		userId VARCHAR(30),
		orderId VARCHAR(30),
		amount FLOAT,
		type VARCHAR(30),
		priceBTC FLOAT,
		currency VARCHAR(30) DEFAULT 'USD',
		dataTime TIMESTAMP,
		timeFilled TIMESTAMP,
		timeCancled  TIMESTAMP
	

	)";

	$res = $mysqli->query($sql);

	$sql = "CREATE TABLE " . $exchange . "Book (

		
		rId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
		timestamp TIMESTAMP,
		amount FLOAT,
		type VARCHAR(30),
		price FLOAT,
		currency VARCHAR(30) DEFAULT 'USD',
        groupId VARCHAR(40) 
	

	)";

	$res = $mysqli->query($sql);
}



?>
