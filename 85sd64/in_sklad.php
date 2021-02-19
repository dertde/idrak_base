<?php
include "func_lib.php";
f_con_db('1');
f_head();
?>

<body>
<?php


$GET_c_html_id = $_GET['c_html_id'];
$GET_c_html_count = $_GET['c_html_count'];
$GET_hiddenField2 = $_GET['hiddenField2'];

$GET_code_client = $_GET['code_client'];



echo ($GET_code_client);
if ($GET_code_client <> '') {


 $sql = "SELECT sum(c_price_azm_distr) FROM ".$c_alfa."t_sk_in WHERE 1";
 $result = mysql_query($sql) or die("Could not connect: " . mysql_error());

 while ($row = mysql_fetch_assoc($result)) {
 $c_a1801 = $row["sum(c_price_azm_distr)"];
 }


 $sql = "update ".$c_alfa."t_account set a1801= a1801+" . $c_a1801 . " where client_id=" . $GET_code_client .
 "";
 $result = mysql_query($sql) or die("Could not connect: " . mysql_error());

 $sql = "INSERT INTO ".$c_alfa."t_zakazi( SELECT c_id_product,c_name_product,c_pw,c_price_azm_distr,'" .
 $kapt . "',c_count,'" . $GET_code_client . "','zakaz' from ".$c_alfa."t_sk_in) ";
 //$sql = "insert into ".$c_alfa."t_zakazi c_id_product,c_name_product, c_pw,c_price_azm_distr,c_date,c_count, client_id,c_status"


 $result = mysql_query($sql) or die("Could not connect: " . mysql_error());

}

//	echo '-----'.$GET_hiddenField2;

if (strlen($GET_c_html_id) == 1) {
 $GET_c_html_id = '00000' . $GET_c_html_id;
}
if (strlen($GET_c_html_id) == 2) {
 $GET_c_html_id = '0000' . $GET_c_html_id;
}
if (strlen($GET_c_html_id) == 3) {
 $GET_c_html_id = '000' . $GET_c_html_id;
}
if (strlen($GET_c_html_id) == 4) {
 $GET_c_html_id = '00' . $GET_c_html_id;
}
if (strlen($GET_c_html_id) == 5) {
 $GET_c_html_id = '0' . $GET_c_html_id;
}

if ($GET_hiddenField2 <> '') {
 $sql = "DELETE FROM ".$c_alfa."t_sk_in WHERE c_id =" . $GET_hiddenField2 . "";
 $result = mysql_query($sql) or die("Could not connect: " . mysql_error());

}


if ($GET_c_html_id <> '') {
 $c_out = f_sklad_insert($GET_c_html_id, $GET_c_html_count);

}
//<h1><?php echo $GET_c_html_id;

?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
 <tr bgcolor="#f87820">
<td class="tabhead"><form id="form1" name="form1" method="get" action=""><img src="blank.gif" width="10" height="25"> Məhsul əlavə etна Anbar 

 <input type="text" name="c_html_id" /><input name="c_html_count" type="text" value="1.00" size="5" />
 <input type="submit" name="Submit" value="Submit" />
</form>
</td>
</tr>
</table>


<br> 
<table border="0" cellpadding="0" cellspacing="0" >

 <tr bgcolor="#f87820">
 <td><img src="blank.gif" width="10" height="25"></td>
 <td class="tabhead"><img src="blank.gif" width="65" height="6"><br><b>Код</b></td>
 <td class="tabhead"><img src="blank.gif" width="85" height="6"><br><b>Başlıq</b></td>
 <td class="tabhead" align='right'><img src="blank.gif" width="55" height="6"><br><b>Кол-во</b></td>
 <td class="tabhead" align='right'><img src="blank.gif" width="85" height="6"><br><b>Вес</b></td>
 <td class="tabhead" align='right'><img src="blank.gif" width="55" height="6"><br><b>Балы</b></td>
 <td class="tabhead" align='right'><img src="blank.gif" width="85" height="6"><br><b>Ц.Укр.</b></td>
 <td class="tabhead" align='right'><img src="blank.gif" width="85" height="6"><br><b>Ц.Дистрб.</b></td>
 <td class="tabhead" align='right'><img src="blank.gif" width="85" height="6"><br><b>Доставка</b></td> 
<td class="tabhead" align='right'><img src="blank.gif" width="85" height="6"><br><b>Прибыль</b></td> 
 
 </tr>

<?php
$sql = "SELECT 
c_id_product,c_name_product,c_ves,c_pw,c_price_ukr,c_price_azm_distr,c_travel,c_pribil,c_count FROM ".$c_alfa."t_sk_in ";
$result = mysql_query($sql) or die("Could not connect: " . mysql_error());


$c_ves_sum = 0;
$c_pw_sum = 0;
$c_price_ukr_sum = 0;
$c_price_azm_distr_sum = 0;
$c_travel_sum = 0;
$c_pribil_sum = 0;
$c_count_sum = 0;

while ($row = mysql_fetch_assoc($result)) {

 $c_id_product = $row["c_id_product"];
 $c_name_product = substr($row["c_name_product"], 0, 30) . '...';

 $c_count = $row["c_count"];

 $c_ves = $c_count * $row["c_ves"];
 $c_pw = $c_count * $row["c_pw"];
 $c_price_ukr = $c_count * $row["c_price_ukr"];
 $c_price_azm_distr = $c_count * $row["c_price_azm_distr"];
 $c_travel = $c_count * $row["c_travel"];
 $c_pribil = $c_count * $row["c_pribil"];



 echo "<tr>";
	echo "<td class='tabval' ></td>";
	echo "<td class='tabval' >" . $c_id_product . "</td>";
	echo "<td class='tabval' >" . $c_name_product ."</td>";
	echo "<td class='tabval' align='right'>" . $c_count . "</td>";
	echo "<td class='tabval' align='right'>" . $c_ves ."</td>";
	echo "<td class='tabval' align='right'>" . $c_pw . "</td>";
	echo "<td class='tabval' align='right'>" . $c_price_ukr ."</td>";
	echo "<td class='tabval' align='right'>" . $c_price_azm_distr . "</td>";
	echo "<td class='tabval' align='right'>" . $c_travel ."</td>";
	echo "<td class='tabval' align='right'>" . $c_pribil . "</td>";
	echo "</tr>";
	echo "<tr valign='bottom'><td bgcolor='#ffffff' background='strichel.gif' colspan='10'><img src='blank.gif' width='1' height='1'></td></tr>";


 $c_ves_sum = $c_ves_sum + $c_ves;
 $c_pw_sum = $c_pw_sum + $c_pw;
 $c_price_ukr_sum = $c_price_ukr_sum + $c_price_ukr;
 $c_price_azm_distr_sum = $c_price_azm_distr_sum + $c_price_azm_distr;
 $c_travel_sum = $c_travel_sum + $c_travel;
 $c_pribil_sum = $c_pribil_sum + $c_pribil;

}

?>
<tr>
 <td colspan="4">&nbsp;</td>

 <td align='right'><? echo $c_ves_sum; ?></td>
 <td align='right'><? echo $c_pw_sum; ?></td>
 <td align='right'><? echo $c_price_ukr_sum; ?></td>
 <td align='right'><? echo $c_price_azm_distr_sum; ?></td>
 <td align='right'><? echo $c_travel_sum; ?></td>
 <td align='right'><? echo $c_pribil_sum; ?></td>
 
	
 </tr>
 <tr valign="bottom"><td bgcolor="#fb7922" colspan="10"><img src="blank.gif" width="1" height="8"></td></tr>
</table>

<?php echo $c_out . "<br>"; ?>



<p>&nbsp;</p>
</body>
</html>
