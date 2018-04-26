<?php

$f_name = $_GET['f_name'];
try {

    $con = new PDO("mysql: host=localhost;dbname=mangogogo", "root", "1470"); 
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$query = "select flower.name, flower.price from flower where flower.name like '%$f_name%' ";
	$query = "select name, price from flower where name like '%$f_name%' ";
	$query = "select flowero.f_name, flowero.f_price from mangogogo.flowero where flowero.f_name like '%$f_name%' ";
    $ps = $con->prepare($query);
    print "<table border='1'>\n";
    $ps->execute();
    $ps->setFetchmode(PDO::FETCH_ASSOC);
    if ($ps->rowCount() > 0) {

        foreach ($ps as $row) {
            print"<tr>\n\n";
            foreach ($row as $f_name => $value) {
                print"<td> $value </td>\n";
            }
            print"</tr>\n";
        }
        print "</table>\n";
    } else {
        print"\nInvalid Item";
    }
} catch (PDOException $ex) {
    echo 'ERROR: ' . $ex->getMessage();
}

return;

// Array with names

$a = array("Iris", "Lilies", "Muscari", "Hellebores",
    "Ranunculus", "Spray Rosee", "Sweet Peas", "Clematis",
    "Sraspedia", "Calla lilies", "Orchid", "Hydrangea", "Carnation", "Daffodils", "Violet Roses",
    "Peony", "Rose", "White Roses", "Yellow Rose", "Lily", "Red Rose", "Tulips");
// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
    $q = strtolower($q);
    $len = strlen($q);
    foreach ($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= ", $name";
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "no suggestion" : $hint;
?>