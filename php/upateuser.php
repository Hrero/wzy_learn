<?php
    include "common.php";
    $upatename = $_REQUEST["upatename"];
    $upatetype = $_REQUEST["upatetype"];
    $usertime = "88小时00分";
    $sql = "SELECT * FROM  user WHERE user='$upatename'";
    $res = mysql_query($sql);
    $num = mysql_num_rows($res);
    $add = 0;
    if($num>0){
        $sql2 = "SELECT pwd FROM  user WHERE user='$upatename'";
        $res2 = mysql_query($sql2);
        $row2 = mysql_fetch_row($res2);
        $arr = explode(",",$upatetype);
        for($i=0;$i<count($arr);$i++){
            $sql1 = "INSERT INTO user(user,pwd,type,time) VALUES ('$upatename','$row2[0]','$arr[$i]','$usertime')";
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
    }else{
       echo "error";
    }
    mysql_close($con);
?>