<?php
// Functie om gegevens uit de database te selecteren en weer te geven
function selecteerGegevens() {
    global $db;

    $query = "SELECT * FROM Producten";
    $resultaat = $db->query($query);

    return $resultaat->fetchAll(PDO::FETCH_ASSOC);
}

// Functie om gegevens in de database op te slaan
function opslaanGegevens($productNaam, $prijsPerStuk, $omschrijving) {
    global $db;

    $query = "INSERT INTO Producten (ProductNaam, PrijsPerStuk, Omschrijving) VALUES (:productNaam, :prijsPerStuk, :omschrijving)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':productNaam', $productNaam, PDO::PARAM_STR);
    $stmt->bindParam(':prijsPerStuk', $prijsPerStuk, PDO::PARAM_STR);
    $stmt->bindParam(':omschrijving', $omschrijving, PDO::PARAM_STR);

    return $stmt->execute();
}

// Functie om gegevens in de database te wijzigen
function wijzigGegevens($productID, $nieuwePrijs, $nieuweOmschrijving) {
    global $db;

    $query = "UPDATE Producten SET PrijsPerStuk = :nieuwePrijs, Omschrijving = :nieuweOmschrijving WHERE ProductID = :productID";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':nieuwePrijs', $nieuwePrijs, PDO::PARAM_STR);
    $stmt->bindParam(':nieuweOmschrijving', $nieuweOmschrijving, PDO::PARAM_STR);
    $stmt->bindParam(':productID', $productID, PDO::PARAM_INT);

    return $stmt->execute();
}

// Functie om gegevens uit de database te verwijderen
function verwijderGegevens($productID) {
    global $db;

    $query = "DELETE FROM Producten WHERE ProductID = :productID";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':productID', $productID, PDO::PARAM_INT);

    return $stmt->execute();
}
?>
