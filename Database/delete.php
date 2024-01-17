<?php
$connection = mysqli_connect("hostname", "username", "password", "winkel");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "DELETE FROM producten WHERE id = 2";

if (mysqli_query($connection, $sql)) {
    echo "Product deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}

mysqli_close($connection);
?>