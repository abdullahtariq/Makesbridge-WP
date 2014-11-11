<?php
$filename = "website_data_" . date('Ymd') . ".xls"; 
header("Content-Disposition: attachment; filename=\"$filename\""); 
header("Content-Type: application/vnd.ms-excel");

//echo $_POST['html'];

$data = array( array("firstname" => "Mary", "lastname" => "Johnson", "age" => 25), 
array("firstname" => "Amanda", "lastname" => "Miller", "age" => 18), array("firstname" => "James", "lastname" => "Brown", "age" => 31), array("firstname" => "Patricia", "lastname" => "Williams", "age" => 7), array("firstname" => "Michael", "lastname" => "Davis", "age" => 43), array("firstname" => "Sarah", "lastname" => "Miller", "age" => 24), array("firstname" => "Patrick", "lastname" => "Miller", "age" => 27) );

/*$flag = false; 
foreach($data as $row) 
{ 
	if(!$flag) { // display field/column names as first row 
		echo implode("\t", array_keys($row)) . "\r\n";
		$flag = true; 
	} 
	array_walk($row, 'cleanData'); 
	echo implode("\t", array_values($row)) . "\r\n"; 
} */
echo $_POST['html'];
exit;

function cleanData(&$str) 
{ 
	$str = preg_replace("/\t/", "\\t", $str); 
	$str = preg_replace("/\r?\n/", "\\n", $str); 
	if(strstr($str, '"')) 
		$str = '"' . str_replace('"', '""', $str) . '"'; 
}
?>