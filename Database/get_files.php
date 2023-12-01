<?php

include "data.php";

$query_zonder_placeholder = "select Continent, Name, Region, SurfaceArea from country";

$statement = $conn->query($query_zonder_placeholder);

$results = $statement->fetchAll();

foreach ($results as $result) {
    echo "pre";
    var_dump($result);
    //echo $result['Name'];
    echo "</pre>";
}

/*$query_met_placeholder = "select Continent, Name, Region, SurfaceArea from country where Name=?";
$data = ["Spain"];

$statement = $conn ->prepare($query_met_placeholder);
$statement->execute($data);

$results = $statement->fetch();

print_r($results);

while ($row = $statement->fetch()) {
    echo $row['Name'] . "<br />\n";
    echo $row['Region'] . "<br/>\n";
    echo $row['Continent'] . "<br />\n";
}
*/