<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET Form</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (!empty($_GET)) {
        echo "<h2>Ingevoerde gegevens (GET):</h2>";
        echo "<p>Naam: " . $_GET['naam'] . "</p>";
        echo "<p>Achternaam: " . $_GET['achternaam'] . "</p>";
        echo "<p>Leeftijd: " . $_GET['leeftijd'] . "</p>";
        echo "<p>Adres: " . $_GET['adres'] . "</p>";
        echo "<p>Email: " . $_GET['email'] . "</p>";
    } else {
        echo "<p>Vul het formulier in om gegevens te verzenden.</p>";
    }
}
?>

<form method="GET" action="get.php">
    <label for="naam">Naam:</label>
    <input type="text" name="naam" required><br>

    <label for="achternaam">Achternaam:</label>
    <input type="text" name="achternaam" required><br>

    <label for="leeftijd">Leeftijd:</label>
    <input type="number" name="leeftijd" required><br>

    <label for="adres">Adres:</label>
    <input type="text" name="adres" required><br>

    <label for="email">Email:</label>
    <input type="email" name="email" required><br>

    <input type="submit" value="Verzenden">
</form>

</body>
</html>

GET:

Parameters worden toegevoegd aan de URL.
Gegevens worden zichtbaar in de URL.
Limiet op de hoeveelheid gegevens die kunnen worden verzonden.
Kan worden geboekt (gecached) door de browser.
Minder veilig voor het verzenden van gevoelige informatie, omdat de gegevens zichtbaar zijn in de URL.

POST:

Parameters worden verzonden als een deel van de HTTP-aanvraag, niet zichtbaar in de URL.
Gegevens zijn niet zichtbaar in de URL en worden niet gecachet door de browser.
Er is geen beperking aan de hoeveelheid gegevens die kunnen worden verzonden.
Veiliger voor het verzenden van gevoelige informatie, omdat gegevens niet zichtbaar zijn in de URL.
Wordt gebruikt wanneer er gegevens moeten worden verzonden die niet in de URL moeten verschijnen (zoals wachtwoorden of grote hoeveelheden gegevens).