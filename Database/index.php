<?php
$connection = mysqli_connect("hostname", "username", "password", "winkel");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM producten ORDER BY naam";
$result = mysqli_query($connection, $sql);

if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "Naam: " . $row["naam"] . " - Beschrijving: " . $row["beschrijving"] . "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($connection);
?>
<a href="delete.php?product_code=2">Delete second product</a>
