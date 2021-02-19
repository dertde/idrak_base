<?php
include "func_lib.php";
f_con_db('1');
f_head();
?>
<body>
<p>
 <?php




$find_id_client = $_POST['find_id_client'];
$find_name_client = $_POST['find_name_client'];
$find_sponsor_id_client = $_POST['find_sponsor_id_client'];
if ($_GET['find_sponsor_id_client']) {
 $find_sponsor_id_client = $_GET['find_sponsor_id_client'];
}

?>
</p>
 <form id="form1" name="form1" method="post" action="select_client.php">
 <table width="100%" border=0 cellpadding="0" cellspacing="0" >
 
 <tr bgcolor="#f87820">
	<td><img src="blank.gif" width="10" height="25"></td>
 <td class="tabhead" ><img src="blank.gif" width="30" height="6"><br><b>Поиск Дистрбьютора</b></td>
 </tr>
 <tr bgcolor="#f87820">
	<td><img src="blank.gif" width="10" height="25"></td>
 <td class="tabhead" ><img src="blank.gif" width="30" height="6"><br> <table width="100%" border="0">
 <tr>
 <td class="tabhead">&#1055;&#1086;&#1080;&#1089;&#1082; &#1087;&#1086; ID
 <input tabindex="16" size="11" name="find_id_client" /></td>
 <td class="tabhead">&nbsp;</td>
 <td class="tabhead">&#1055;&#1086;&#1080;&#1089;&#1082; &#1087;&#1086; &#1048;&#1084;&#1077;&#1085;&#1080; &#1080;&#1083;&#1080; &#1060;&#1072;&#1084;&#1080;&#1083;&#1080;&#1080;

 <input tabindex="16" size="20" name="find_name_client" /></td>
 <td class="tabhead">&nbsp;</td>
 <td class="tabhead">&#1055;&#1086;&#1080;&#1089;&#1082; &#1087;&#1086; &#1089;&#1087;&#1086;&#1085;&#1089;&#1086;&#1088;&#1091;
 <select name="find_sponsor_id_client">
 <option value=0>--</option>
 <?php
$sql = "SELECT client_id,client_name,client_lastname FROM ".$c_alfa."t_client WHERE client_id in (select distinct(client_sponsor) FROM ".$c_alfa."t_client) order by client_name ";

$result = mysql_query($sql) or die("5Could not connect: " . mysql_error());

while ($row = mysql_fetch_assoc($result)) {
 $row_client_id = $row["client_id"];
 $row_client_name = $row["client_name"];
 $row_client_lastname = $row["client_lastname"];


 echo "<option value='" . $row_client_id . "'>" . $row_client_name . " " . $row_client_lastname .
 "</option>";
}


?>
 
 </select> </td>
 <td><input type="submit" name="Submit" value="&#1055;&#1086;&#1080;&#1089;&#1082; " /></td>
 <td>&nbsp;&nbsp;&nbsp;</td>
 </tr>
 </table></td>
 </tr>
 </table>
</form>

 <br>

 <table border=0 cellpadding="0" cellspacing="0" >
 
 <tr bgcolor="#f87820">
	<td><img src="blank.gif" width="10" height="25"></td>
 <td class="tabhead" ><img src="blank.gif" width="30" height="6"><br><b>&#8470;</b></td>

 <td class="tabhead"><img src="blank.gif" width="150" height="6"><br><b>Ф.И.О</b></td>
	 <td class="tabhead"><img src="blank.gif" width="85" height="6"><br><b> Телефон</b></td>

 <td class="tabhead"><img src="blank.gif" width="120" height="6"><br><b>Спонсор </b></td>
 <td class="tabhead"><img src="blank.gif" width="50" height="6"><br><b> </b></td>
 <td class="tabhead"><img src="blank.gif" width="47" height="6"><br><b> </b></td>
 <td class="tabhead"><img src="blank.gif" width="60" height="6"><br><b> </b></td>
 <td class="tabhead"><img src="blank.gif" width="50" height="6"><br><b> </b></td>
	 
 </tr>
 
 <tbody>
 <?php



$sql = "SELECT * FROM ".$c_alfa."t_client order by client_id ";

if ($find_id_client) {
 $sql = "SELECT * FROM ".$c_alfa."t_client WHERE client_id = " . $find_id_client .
 " order by client_id ";
} elseif ($find_sponsor_id_client > 0) {

 $sql = "SELECT * FROM ".$c_alfa."t_client WHERE client_sponsor = " . $find_sponsor_id_client .
 " order by client_id ";
} elseif ($find_name_client and $find_sponsor_id_client <> '0') {
 $sql = "SELECT * FROM ".$c_alfa."t_client WHERE (client_name LIKE '" . $find_id_client .
 "' or client_lastname LIKE '" . $find_id_client . "' or client_name LIKE '%" . $find_id_client .
 "' or client_lastname LIKE '%" . $find_id_client . "' or client_name LIKE '" . $find_id_client .
 "%' or client_lastname LIKE '" . $find_id_client . "%' or client_name LIKE '%" .
 $find_name_client . "%' or client_lastname LIKE '%" . $find_name_client .
 "%') and (client_sponsor = " . $find_sponsor_id_client .
 ") order by client_id ";
} elseif ($find_name_client <> 'xxx') {

 $sql = "SELECT * FROM ".$c_alfa."t_client WHERE client_name LIKE '" . $find_name_client .
 "' or client_lastname LIKE '" . $find_name_client . "' or client_name LIKE '%" .
 $find_name_client . "' or client_lastname LIKE '%" . $find_name_client .
 "' or client_name LIKE '" . $find_name_client . "%' or client_lastname LIKE '" .
 $find_name_client . "%' or client_name LIKE '%" . $find_name_client .
 "%' or client_lastname LIKE '%" . $find_name_client . "%' order by client_id ";

}
$i = 0;

if (strlen($sql) > 6) {
 $result = mysql_query($sql) or die("5Could not connect: " . mysql_error());

 while ($row = mysql_fetch_assoc($result)) {
 $row_client_id = $row["client_id"];
 $row_client_name = $row["client_name"];
 $row_client_lastname = $row["client_lastname"];
 $row_client_phone = substr($row["client_phone"], 1, 10);
 $row_client_comment = $row["client_comment"];
 $row_client_sponsor = $row["client_sponsor"];
 $row_client_sponsor = f_get_sponsor_name($row_client_sponsor);

 if (strlen($row_client_name) == 0) {
 $row_client_name = 'xxx';
 }
 if (strlen($row_client_lastname) == 0) {
 $row_client_lastname = 'xxx';
 }
 if (strlen($row_client_phone) == 0) {
 $row_client_phone = 'xxx';
 }
 if (strlen($row_client_comment) == 0) {
 $row_client_comment = 'xxx';
 }
 if (strlen($row_client_sponsor) == 0) {
 $row_client_sponsor = '3';
 }
 $i = $i + 1;

 echo "<tr>".
		"<td class='tabval'><img src='blank.gif' width='10' height='20'></td><td class='tabval'><a href='update_client.php?Search=" . $row_client_id . "'>" . $row_client_id."</a></td class='tabval'><td class='tabval'><a href='select_client.php?find_sponsor_id_client=" . $row_client_id ."'>" . $row_client_name . " " . $row_client_lastname . "</a></td><td class='tabval'>" . $row_client_phone ."</td> <td class='tabval'>" . $row_client_sponsor ."</td><td class='tabval'><a href='client_zakazi_777.php?client_id=" . $row_client_id ."'>Заказы</a>" . "</td><td class='tabval'><a href='qw2.php?client_id=" . $row_client_id ."'>Товар</a></td><td class='tabval'><a href='insert_client.php?client_sponsor=" . $row_client_id ."'>Спонсор</a>" . "</td><td class='tabval'><a href='plus_pw.php?client_id=" . $row_client_id ."'>+Баллы</a>" . "</td> </tr><tr valign='bottom'><td bgcolor='#ffffff' background='strichel.gif' colspan='6'><img src='blank.gif' width='1' height='1'></td></tr>";
 }
}
?>
<tr valign="bottom"><td bgcolor="#fb7922" colspan="9"><img src="blank.gif" width="1" height="8"></td></tr>
 </tbody>
</table>
<?php
if ($i > 0) {
 echo 'Количество клиентов :' . $i;
}
?>

</body>
</html>
