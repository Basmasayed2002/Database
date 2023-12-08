<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "winkel";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>


<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Product Toevoegen</title>
</head>
<body>
    <h2>Voeg een nieuw product toe</h2>
    <form action="insert.php" method="POST">
        Product Naam: <input type="text" name="product_naam" required><br>
        Prijs per Stuk: <input type="number" name="prijs_per_stuk" step="0.01" required><br>
        Omschrijving: <textarea name="omschrijving" required></textarea><br>
        <input type="submit" value="Toevoegen">
    </form>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $product_naam = $_POST["product_naam"];
    $prijs_per_stuk = $_POST["prijs_per_stuk"];
    $omschrijving = $_POST["omschrijving"];

    try {
    
        $sql = "INSERT INTO producten (product_naam, prijs_per_stuk, omschrijving) VALUES (:product_naam, :prijs_per_stuk, :omschrijving)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':product_naam', $product_naam);
        $stmt->bindParam(':prijs_per_stuk', $prijs_per_stuk);
        $stmt->bindParam(':omschrijving', $omschrijving);
        $stmt->execute();

        echo "Product toegevoegd aan de database.";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}


$conn = null;
?>

