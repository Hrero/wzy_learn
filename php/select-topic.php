<?php
	include "common.php";
	$typeName = $_REQUEST["typeName"];
	$typeColumn = $_REQUEST["typeColumn"];
	$id = $_REQUEST["id"];
	$sql = "SELECT $typeColumn FROM $typeName WHERE id='$id'";
	$res = mysql_query($sql);
	$arr = array();
	while($row = mysql_fetch_row($res)){
		if($row[0]){
			array_push($arr,$row[0]);
		}
	};
	echo json_encode($arr);
	mysql_close($con);
 ?>