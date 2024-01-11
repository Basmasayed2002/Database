<?php
// Database connectie instellingen
$host = 'localhost'; 
$dbnaam = 'winkel';
$gebruiker = 'root';
$wachtwoord = '';

try {
    $db = new PDO("mysql:host=$host;dbname=$dbnaam", $gebruiker, $wachtwoord);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Fout bij verbinden met de database: " . $e->getMessage());
}
?>
