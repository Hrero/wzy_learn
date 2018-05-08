<?php
    $con = mysql_connect("w.rdc.sae.sina.com.cn:3306","4n1jmo51zw","ii0whxlim51hhj11jyl1j0x3hjzyhli2kyy3x4x5");
if(!$con){
    die("数据库连接失败");
};
mysql_query("SET NAMES UTF8");
mysql_select_db("app_jdyzxlx8");
    ?>