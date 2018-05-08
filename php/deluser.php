<?php
    include "common.php";
    $delnum = $_REQUEST["delnum"];
    $delname = $_REQUEST["delname"];
    $deltype = $_REQUEST["deltype"];
    $sql = "SELECT * FROM  user WHERE user='$delname'";
    $res = mysql_query($sql);
    $num = mysql_num_rows($res);
    $add = 0;
    if($num>0 || $delnum == "3"){
        if($delnum == "1"){
            $arr = explode(",",$deltype);
            for($i=0;$i<count($arr);$i++){
                $sql1 = "DELETE FROM user WHERE user='$delname' AND type='$arr[$i]'";
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
        }else if($delnum == "2"){
            $sql2 = "DELETE FROM user WHERE user='$delname'";
            $res2 = mysql_query($sql2);
            if(res2){
                echo "success";
            }
        }else{
            $sql3 = "DELETE FROM user";
            $res3 = mysql_query($sql3);
            if(res3){
                echo "success";
            }
        }
    }else{
        echo "error";
    }
    mysql_close($con);
?>