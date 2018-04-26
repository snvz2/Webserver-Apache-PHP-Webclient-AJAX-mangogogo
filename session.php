<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Bouquets</title>
</head>
<body>

<?php
	session_start();
	$occasion_record ="";
	$price_record ="";
	$result = "";
	$result1 = "";
	//read data from form
	$occasion = filter_input(INPUT_POST, "occasion");
	$price = filter_input(INPUT_POST, "price");
	$history = filter_input(INPUT_POST,"history");
	
	//
	if (isset($_SESSION["occasion_record"]) && isset($_SESSION["price_record"]) ){
		$_SESSION["occasion_record"] .= $occasion . " ";
		$_SESSION["price_record"] .= $price . " ";
	}
	else{
		$_SESSION["occasion_record"] = $occasion . " ";
		$_SESSION["price_record"] = $price . " ";
	}
	$result = $_SESSION["occasion_record"] ." ";
	$result1 = $_SESSION["price_record"].PHP_EOL . " ";
	include "form.html";
	$history = "$result";
	//print "RESULTS:";
	//print $result;
	//print "$result1";
	
	print "<h2>Bouquets Available:</h2>";

	$pieces;
	$delimiter = " ";
	$pieces = explode ($delimiter, $result);
	$pieces1 = explode ($delimiter, $result1);
	$arlength = count($pieces);
	print "<table border='2'>";
		    print "<tr>";
	            print "<th>  Occasion    </th><th>  Price   </th>";
		    print "</tr>";
	for ($i = 0; $i < $arlength; $i++){
		//print "$pieces[$i]";
		
		//if ($result[$i] == $delimiter){
			print "<tr>";
			  print "<td>";
			     print $pieces[$i];
			  print "</td>";
			  print "<td>";
			     print $pieces1[$i];
			  print "</td>";
			print "</tr>";
		//} else {
		//	print "$result[$i]";
		//}
	}
	print "</table>";
?>
</body>
</html>