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
$c_id= $_GET['c_id'];
$c_do= $_GET['c_do'];




if ($c_do == 'del') {
 $sql = "DELETE FROM c_vid WHERE c_id =".$c_id."";
 $result = mysql_query($sql) or die("Could not connect1: " . mysql_error());

}


if ($GET_textfield <> '') {
 $sql = "INSERT INTO c_vid (c_id, c_name, c_date) VALUES (NULL, '" . $GET_textfield .
 "', '" . $f_today1 . "');";
 $result = mysql_query($sql) or die("Could not connect2: " . mysql_error());
}

?>


<table border="0" cellpadding="0" cellspacing="0" width="100%">
 <tr bgcolor="#f87820">
<td class="tabhead">
<form id="form1" name="form1" method="get" action=""> <img src="blank.gif" width="10" height="25"> Növü əlavə et

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
  
 <td class="tabhead" ><img src="blank.gif" width="85" height="6"><br><b>Növün adı</b></td>
 <td class="tabhead" ><img src="blank.gif" width="55" height="6"><br><b> </b></td>
  </tr>




 <?php

$sql = "SELECT c_id,c_name,c_date FROM c_vid WHERE 1";
$result = mysql_query($sql) or die("Could not connect: " . mysql_error());

while ($row = mysql_fetch_assoc($result)) {
 $c_id = $row["c_id"];
 $c_name = $row["c_name"];

echo "<td class='tabval' ></td>";
	
	echo "<td class='tabval' >" . $c_name ."</td>";
echo "<td class='tabval' ><a href='1insert_vid.php?c_id=". $c_id ."&c_do=del'>Удалить</a></td>";
echo "</tr>";
echo "<tr valign='bottom'><td bgcolor='#ffffff' background='strichel.gif' colspan='10'><img src='blank.gif' width='1' height='1'></td></tr>";


}

?>
 <tr valign="bottom"><td bgcolor="#fb7922" colspan="10"><img src="blank.gif" width="1" height="8"></td></tr>
</table>

</body>
</html>
