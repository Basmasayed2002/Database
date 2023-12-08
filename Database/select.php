<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Winkel";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    // Hoe je alles selecteert in een query zonder variabele
    echo "<h3>Alle producten:</h3>";
    $statement = $conn->query("SELECT * FROM producten");
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        echo "Product Naam: " . $row['product_naam'] . "<br>";
        echo "Prijs per Stuk: " . $row['prijs_per_stuk'] . "<br>";
        echo "Omschrijving: " . $row['omschrijving'] . "<br><br>";
    }

    // Hoe je een single row selecteert met placeholders
    echo "<h3>Product met product_code 1:</h3>";
    $statement = $conn->prepare("SELECT * FROM producten WHERE product_code = ?");
    $statement->execute([1]);
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    echo "Product Naam: " . $row['product_naam'] . "<br>";
    echo "Prijs per Stuk: " . $row['prijs_per_stuk'] . "<br>";
    echo "Omschrijving: " . $row['omschrijving'] . "<br><br>";


    //  Hoe je een single row selecteert met named parameters
    echo "<h3>Product met product_code 2:</h3>";
    $statement = $conn->prepare("SELECT * FROM producten WHERE product_code = :product_code");
    $statement->bindParam(':product_code', $product_code);
    $product_code = 2;
    $statement->execute();
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    echo "Product Naam: " . $row['product_naam'] . "<br>";
    echo "Prijs per Stuk: " . $row['prijs_per_stuk'] . "<br>";
    echo "Omschrijving: " . $row['omschrijving'] . "<br><br>";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>
