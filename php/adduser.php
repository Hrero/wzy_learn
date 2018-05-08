<?php 
	include "common.php";
	$addname = $_REQUEST["addname"];
	$addpwd = $_REQUEST["addpwd"];
	$addtype = $_REQUEST["addtype"];
	$usertime = "88小时00分";
	$sql = "SELECT * FROM  user WHERE user='$addname'";
	$res = mysql_query($sql);
	$num = mysql_num_rows($res);
	$add = 0;
	if($num>0){
		echo "repeat";
	}else{
		$arr = explode(",",$addtype);
        for($i=0;$i<count($arr);$i++){
            $sql1 = "INSERT INTO user(user,pwd,type,time) VALUES ('$addname','$addpwd','$arr[$i]','$usertime')";
            $res1 = mysql_query($sql1);
            if($res1){
                $add++;
            }
		}
		if($add == count($arr)){
        	echo "success";
		}else{
			echo "error";
		}
	}
	mysql_close($con);
 ?>