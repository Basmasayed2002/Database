<?php
include('dbconn.php');
include('functions.php');


// 1. Gegevens selecteren en weergeven
$gegevens = selecteerGegevens();
print_r($gegevens);

// 2. Gegevens toevoegen aan de database
opslaanGegevens('Nieuw Product', 49.99, 'Dit is een nieuw product.');

// 3. Gegevens wijzigen in de database (bijvoorbeeld ProductID = 1)
wijzigGegevens(1, 39.99, 'Bijgewerkte omschrijving voor Product 1');

// 4. Gegevens verwijderen uit de database (bijvoorbeeld ProductID = 2)
verwijderGegevens(2);
?>
