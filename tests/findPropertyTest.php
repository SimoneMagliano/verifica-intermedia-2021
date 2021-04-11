<?php
$users = include(__DIR__."/mockdata_array.php");
// Test ricerca omonimi
// expectedResult è il risultato della funzione  count applicato al risultato della ricerca 
$testResultsDataset = array(
	array(
		"firstName" => "Achille",
		"lastName" => "BIANCHI",
		"expectedResult" => 2,
	),
	array(
		"firstName" => "Adamo",
		"lastName" => "ROSSI",
		"expectedResult" => 2,
	),
	array(
		"firstName" => "Adriano",
		"lastName" => "ROMANO",
		"expectedResult" => 2,
	),
	array(
		"firstName" => "Luigi",
		"lastName" => "RUSSO",
		"expectedResult" => 2,
	),
	array(
		"firstName" => "Mario",
		"lastName" => "FERRARI",
		"expectedResult" => 2,
	),
);

foreach ($testResultsDataset as $row) {
        extract($row);
		/**
		 * scrivi qui il tuo test
		 */
        
}