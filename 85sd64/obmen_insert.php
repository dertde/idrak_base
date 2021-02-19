<?php
include "func_lib.php";
f_con_db('1');
f_head();
?>


<body>
<?php
//print_r($_GET);
//print_r($_POST);

$f_today1 = f_today(1);

$GET_textfield = $_GET['textfield'];
$c_id_ob= $_GET['c_id_ob'];
$c_do= $_GET['c_do'];




if ($c_do == 'del') {
 $sql = "DELETE FROM ".$c_alfa."t_sk_ob WHERE c_id_ob =" . $c_id_ob . "";
 $result = mysql_query($sql) or die("Could not connect1: " . mysql_error());

}


if ($GET_textfield <> '') {
 $sql = "INSERT INTO ".$c_alfa."t_sk_ob (c_id_ob, c_name_ob, c_ob_date) VALUES (NULL, '" . $GET_textfield .
 "', '" . $f_today1 . "');";
 $result = mysql_query($sql) or die("Could not connect2: " . mysql_error());
}

?>


<table border="0" cellpadding="0" cellspacing="0" width="100%">
 <tr bgcolor="#f87820">
<td class="tabhead"><form id="form1" name="form1" method="get" action=""> <img src="blank.gif" width="10" height="25"> Добавления Anbarа для обмена

 <input type="text" name="textfield" size="50"/>
 <input type="submit" name="Submit" value="Submit" />
</form>
</td>
</tr>
</table>



<br>


<table border="0" cellpadding="0" cellspacing="0" >

 <tr bgcolor="#f87820">
 <td><img src="blank.gif" width="10" height="25"></td>
  
 <td class="tabhead" align='right'><img src="blank.gif" width="85" height="6"><br><b>Başlıq Anbarа</b></td>
 <td class="tabhead" align='right'><img src="blank.gif" width="55" height="6"><br><b> </b></td>
  </tr>




 <?php

$sql = "SELECT c_id_ob,c_name_ob,c_ob_date FROM ".$c_alfa."t_sk_ob WHERE 1";
$result = mysql_query($sql) or die("Could not connect: " . mysql_error());

while ($row = mysql_fetch_assoc($result)) {
 $c_id_ob = $row["c_id_ob"];
 $c_name_ob = $row["c_name_ob"];

echo "<td class='tabval' ></td>";
	
	echo "<td class='tabval' >" . $c_name_ob ."</td>";
echo "<td class='tabval' ><a href='obmen_insert.php?c_id_ob=". $c_id_ob ."&c_do=del'>Удалить</a></td>";
echo "</tr>";
echo "<tr valign='bottom'><td bgcolor='#ffffff' background='strichel.gif' colspan='10'><img src='blank.gif' width='1' height='1'></td></tr>";


}

?>
 <tr valign="bottom"><td bgcolor="#fb7922" colspan="10"><img src="blank.gif" width="1" height="8"></td></tr>
</table>

</body>
</html>
