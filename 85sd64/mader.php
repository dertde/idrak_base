<?php

function f_move($c_id_product,$c_id_user)
{
 f_con_db('1');
 $sql = "SELECT c_id_product,c_id_user FROM `t_move` WHERE `c_id_product` =" . $c_in . " ";
  $result = mysql_query($sql) or die("Could not connect: " . mysql_error());

 if ($result) {
 
 while ($row = mysql_fetch_assoc($result)) {
 $c_id_product = $row["c_id_product"];
 $c_id_user = $row["c_id_user"];
 }
}

?> 