<?php
	include "common.php";
	$typeName = $_REQUEST["typeName"];
	$oneLen = $_REQUEST["oneLen"];
	$moreLen = $_REQUEST["moreLen"];
	$oneStart = $_REQUEST["oneStart"];
	$moreStart = $_REQUEST["moreStart"];
	$caseStart = $_REQUEST["caseStart"];
	$index = $_REQUEST["index"];
	if($index == 1){
		$sql = "SELECT onec FROM $typeName WHERE id<=$oneLen limit $oneStart,103";
		$res = mysql_query($sql);
		$sql1 = "SELECT more FROM $typeName WHERE id<=$moreLen limit $moreStart,23";
		$res1 = mysql_query($sql1);
		$arrData= array();
		$arr = array();
		while($row = mysql_fetch_row($res)){
			if($row[0]){
				array_push($arr,$row[0]);
			}
		};
		$arr1 = array();
		while($row1 = mysql_fetch_row($res1)){
			if($row1[0]){
				array_push($arr1,$row1[0]);
			}
		};
		array_push($arrData,$arr);
		array_push($arrData,$arr1);
		echo json_encode($arrData);
	}else{
		if($typeName == "abc"){
            $sql2 = "SELECT onec FROM $typeName WHERE id<=$oneLen limit $oneStart,59";
            $res2 = mysql_query($sql2);
            $sql3 = "SELECT more FROM $typeName WHERE id<=$moreLen limit $moreStart,17";
            $res3 = mysql_query($sql3);
            $sql4 = "SELECT caseaa FROM $typeName limit $caseStart,3";
            $res4 = mysql_query($sql4);
		}else{
            $sql2 = "SELECT onec FROM $typeName WHERE id<=$oneLen limit $oneStart,60";
            $res2 = mysql_query($sql2);
            $sql3 = "SELECT more FROM $typeName WHERE id<=$moreLen limit $moreStart,12";
            $res3 = mysql_query($sql3);
            $sql4 = "SELECT caseaa FROM $typeName limit $caseStart,4";
            $res4 = mysql_query($sql4);
		}
		$arrData1 = array();
		$arr2 = array();
		while($row2 = mysql_fetch_row($res2)){
			if($row2[0]){
				array_push($arr2,$row2[0]);
			}
		};
		$arr3 = array();
		while($row3 = mysql_fetch_row($res3)){
			if($row3[0]){
				array_push($arr3,$row3[0]);
			}
		};
		$arr4 = array();
		while($row4 = mysql_fetch_row($res4)){
			if($row4[0]){
				array_push($arr4,$row4[0]);
			}
		};
		array_push($arrData1,$arr2);
		array_push($arrData1,$arr3);
		array_push($arrData1,$arr4);
		echo json_encode($arrData1);
	}
	mysql_close($con);
 ?>