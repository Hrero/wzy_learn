<?php
    include "common.php";
	$username = $_REQUEST["username"];
	$usertype = $_REQUEST["usertype"];
	$usertime = $_REQUEST["usertime"];
    $sql = "UPDATE user SET time='$usertime' WHERE user='$username' and type='$usertype'";
    $res = mysql_query($sql);
    if($res){
        echo "success";
    }else{
        echo "error";
    }
	mysql_close($con);
?>