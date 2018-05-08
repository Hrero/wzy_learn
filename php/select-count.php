<?php
    include "common.php";
    $typeName = $_REQUEST["typeName"];
    $sql = "SELECT COUNT(*) onec FROM $typeName WHERE onec!=''";
    $res = mysql_query($sql);
    $sql1 = "SELECT COUNT(*) more FROM $typeName WHERE more!=''";
    $res1 = mysql_query($sql1);
    $sql2 = "SELECT COUNT(*) caseaa FROM $typeName WHERE caseaa!=''";
    $res2 = mysql_query($sql2);
    $arr = array();
    $row = mysql_fetch_row($res);
    array_push($arr,$row[0]);
    $row1 = mysql_fetch_row($res1);
    array_push($arr,$row1[0]);
    $row2 = mysql_fetch_row($res2);
    array_push($arr,$row2[0]);
    echo json_encode($arr);
    mysql_close($con);
?>