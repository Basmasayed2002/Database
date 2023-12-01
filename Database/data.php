<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "world";

try {

    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAtrribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    echo "De connectie is gelukt";
}
catch (PDOException $e) {
    echo "er is een fout opgetreden, namelijk deze fout:" . $e->getMessage() . '<br>';
    echo "bestand" . $e->getFile() . '<br>';
    echo "regel: " . $e->getLine();
}