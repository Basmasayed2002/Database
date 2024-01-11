<?php
// Verbinding met de database
$host = 'localhost'; 
$dbnaam = 'winkel';
$gebruiker = 'root';
$wachtwoord = '';

try {
    $db = new PDO("mysql:host=$host;dbname=$dbnaam", $gebruiker, $wachtwoord);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Fout bij verbinden met de database: " . $e->getMessage();
    exit();
}

// Verwerk het formulier als het is gestuurd
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ontvang de formuliergegevens
    $productNaam = $_POST['product_naam'];
    $prijsPerStuk = $_POST['prijs_per_stuk'];
    $omschrijving = $_POST['omschrijving'];

    // Voorbeeldupdatequery voor het tweede product 
    $updateQuery = "UPDATE Producten SET PrijsPerStuk = :prijs, Omschrijving = :omschrijving WHERE ProductID = 2";

    // Voorbereiden en uitvoeren van de query met PDO
    $stmt = $db->prepare($updateQuery);
    $stmt->bindParam(':prijs', $prijsPerStuk, PDO::PARAM_STR);
    $stmt->bindParam(':omschrijving', $omschrijving, PDO::PARAM_STR);

    try {
        $stmt->execute();
        echo "Product bijgewerkt!";
    } catch (PDOException $e) {
        echo "Fout bij het bijwerken van het product: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Update</title>
</head>
<body>

<h2>Update Product</h2>
<form method="post" action="">
    <label for="product_naam">Product Naam:</label>
    <input type="text" name="product_naam" required><br>

    <label for="prijs_per_stuk">Prijs Per Stuk:</label>
    <input type="text" name="prijs_per_stuk" required><br>

    <label for="omschrijving">Omschrijving:</label>
    <textarea name="omschrijving" rows="4" required></textarea><br>

    <input type="submit" value="Update Product">
</form>

</body>
</html>
