<?php
include "func_lib.php";
f_con_db('1');
f_head();
?>

<body>
<p>
 <?php

@$find_id_client = $_POST['find_id_client'];
@$find_name_client = $_POST['find_name_client'];
@$find_sponsor_id_client = $_POST['find_sponsor_id_client'];
if (@$_GET['find_sponsor_id_client']) {
 $find_sponsor_id_client = $_GET['find_sponsor_id_client'];
}

?>
</p>

<table border="0">
 <tr>
 <td>
 <form id="form1" name="form1" method="post" action="ot4_balli.php">

		 <fieldset ><legend >
		 <h3>Поиск Дистрбьютора</h3></legend>
		 <table width="100%" border="0">
 <tr>
 <td>Поиск по ID
 <input tabindex="16" size="11" name="find_id_client" /></td>
 <td>&nbsp;</td>
 <td>Поиск по Имени или Фамилии

 <input tabindex="16" size="20" name="find_name_client" /></td>
 <td>&nbsp;</td>
 <td>Поиск по спонсору
 <select name="find_sponsor_id_client">
 <option value=0>--</option>
 <?php
$sql = "SELECT client_id,client_name,client_lastname FROM ".$c_alfa."t_client WHERE client_id in (select distinct(client_sponsor) FROM ".$c_alfa."t_client) order by client_name ";

$result = mysql_query($sql) or die("5Could not connect: " . mysql_error());

while ($row = mysql_fetch_assoc($result)) {
 $row_client_id = $row["client_id"];
 $row_client_name = $row["client_name"];
 $row_client_lastname = $row["client_lastname"];


 echo "<option value='" . $row_client_id . "'>" . $row_client_name . " " . $row_client_lastname ."</option>";
}


?>
 
 </select> </td>
 <td><input type="submit" name="Submit" value="&#1055;&#1086;&#1080;&#1089;&#1082; " /></td>
 <td>&nbsp;&nbsp;&nbsp;</td>
 </tr>
 </table>
		
		 </fieldset>
 </form></td>
 </tr>
</table>
 <br>
<table border="0" cellpadding="0" cellspacing="0" >

 <tr bgcolor="#f87820">
 <td><img src="blank.gif" width="10" height="25"></td>
  <td class="tabhead"><img src="blank.gif" width="35" height="6"><br><b>№</b></td>
   <td class="tabhead"><img src="blank.gif" width="65" height="6"><br><b>Имя</b></td>
    <td class="tabhead"><img src="blank.gif" width="90" height="6"><br><b>Телефон</b></td>
	 <td class="tabhead"><img src="blank.gif" width="65" height="6"><br><b>Спонсор</b></td>
	  <td class="tabhead"><img src="blank.gif" width="65" height="6"><br><b>   </b></td>
	   <td class="tabhead" align='right'><img src="blank.gif" width="65" height="6"><br><b>Баллы</b></td>
	    <td class="tabhead" align='right'><img src="blank.gif" width="65" height="6"><br><b>&nbsp;&nbsp;Гр.Баллы</b></td>
		 <td class="tabhead" align='right'><img src="blank.gif" width="65" height="6"><br><b>&nbsp;&nbsp;Зарплата</b></td>

 </tr>
 </thead>
 <tbody>
 <?php

f_reload_pw();

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
 $c_ball = f_t_client_pw($row_client_id);
 $c_gr_ball = f_cl_gr_pw($row_client_id);
 //$c_gr_ball =$c_gr_ball+$c_ball;
 $cball_out = f_cl_gr_zpt($row_client_id);
 //


 echo "<tr>	";
 echo "<td class='tabval' ></td>";
 echo "<td class='tabval' ><a href='update_client.php?Search=" . $row_client_id . "'>" . $row_client_id . "</a></td>";
 echo "<td class='tabval' ><a href='ot4_balli.php?find_sponsor_id_client=" . $row_client_id . "'>" . $row_client_name . " " . $row_client_lastname . "</a></td>";
 echo "<td class='tabval' >" . $row_client_phone . "</td> ";
 echo "<td class='tabval' >" . $row_client_sponsor . "</td>";
 echo "<td class='tabval' ><a href='client_zakazi.php?client_id=" . $row_client_id . "'>Заказы</a>" . "</td>";
 echo "<td class='tabval' align='right' >" . $c_ball . "</td>";
 echo "<td class='tabval' align='right'>" . $c_gr_ball . "</td>";
 echo "<td class='tabval' align='right' >" . $cball_out . "</td> ";
 echo "</tr>";




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

