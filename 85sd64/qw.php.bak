<?php
include "func_lib.php";
f_con_db('1');
f_head();
?>

<body>
<?php


$GET_textfield = $_GET['textfield'];
$GET_textfield1 = $_GET['textfield1'];
$GET_hiddenField2 = $_GET['hiddenField2'];

$GET_code_client = $_GET['code_client'];



echo ($GET_code_client);
if ($GET_code_client <> '') {


    $sql = "SELECT sum(c_price_azm_distr) FROM ".$c_alfa."t_sklad_temp WHERE 1";
    $result = mysql_query($sql) or die("1Could not connect: " . mysql_error());


    $sql = "INSERT INTO  ".$c_alfa."t_zakazi( SELECT '',c_id_product,c_name_product,c_comment_product,c_netto,c_pw,c_price_ukr,c_price_azm_distr,c_price_azm_klient,'" .
        $kapt . "',c_ves,c_travel,c_pribil,c_count,'" . $GET_code_client .
        "','zakaz' from ".$c_alfa."t_sklad_temp) ";
  $result = mysql_query($sql) or die("2Could not connect: " . mysql_error());

}

//	echo '-----'.$GET_hiddenField2;

if (strlen($GET_textfield) == 1) {
    $GET_textfield = '00000' . $GET_textfield;
}
if (strlen($GET_textfield) == 2) {
    $GET_textfield = '0000' . $GET_textfield;
}
if (strlen($GET_textfield) == 3) {
    $GET_textfield = '000' . $GET_textfield;
}
if (strlen($GET_textfield) == 4) {
    $GET_textfield = '00' . $GET_textfield;
}
if (strlen($GET_textfield) == 5) {
    $GET_textfield = '0' . $GET_textfield;
}

if ($GET_hiddenField2 <> '') {
    $sql = "DELETE FROM ".$c_alfa."t_sklad_temp WHERE c_id_product =" . $GET_hiddenField2 . "";
    $result = mysql_query($sql) or die("3Could not connect: " . mysql_error());

}


if ($GET_textfield <> '') {
    $sql = "insert into ".$c_alfa."t_sklad_temp (SELECT *,'" . $GET_textfield1 .
        "' FROM ".$c_alfa."t_sklad WHERE c_id_product= '" . $GET_textfield . "')";
    $result = mysql_query($sql) or die("4Could not connect: " . mysql_error());
}

?>
<h1><?php echo $GET_textfield; ?></h1>
    
     
        

<table border="0" cellpadding="0" cellspacing="0" width="100%">
 <tr bgcolor="#f87820">
<td class="tabhead"><form id="form1" name="form1" method="get" action=""><img src="blank.gif" width="10" height="25">

  ID Продукта <input type="text" name="textfield"/>
  <input name="textfield1" type="text" value="1.00" size="5" />
  <input type="submit" name="Submit" value="Добавить Товар" />
</form>
</td>
</tr>
</table>
<br>


<table border="0" cellpadding="0" cellspacing="0" >

 <tr bgcolor="#f87820">
 <td><img src="blank.gif" width="10" height="25"></td>
 <td class="tabhead" align='left'><img src="blank.gif" width="65" height="6"><br><b>Код</b></td>
 <td class="tabhead" align='left'><img src="blank.gif" width="85" height="6"><br><b>Название</b></td>
 <td class="tabhead" align='right'><img src="blank.gif" width="55" height="6"><br><b>Кол-во</b></td>
 <td class="tabhead" align='right'><img src="blank.gif" width="55" height="6"><br><b>Балы</b></td>
 <td class="tabhead" align='right'><img src="blank.gif" width="85" height="6"><br><b>Ц.Укр.</b></td>
 <td class="tabhead" align='right'><img src="blank.gif" width="85" height="6"><br><b>Ц.Дистрб.</b></td>
<td class="tabhead" align='right'><img src="blank.gif" width="85" height="6"><br><b> </b></td>
 </tr>

<?php
$sql = "SELECT * FROM ".$c_alfa."t_sklad_temp order by c_id_product  ";
$result = mysql_query($sql) or die("5Could not connect: " . mysql_error());

$с_pw_sum = 0;
$c_price_azm_distr_sum = 0;
$c_price_azm_klient_sum = 0;
while ($row = mysql_fetch_assoc($result)) {
    $c_count = $row["c_count"];
    $c_id_val = $row["c_id_product"];
    $c_name_product = $row["c_name_product"];

    $c_price_azm_distr = round($row["c_price_azm_distr"] * $c_count, 2);
    $c_price_azm_klient = round($row["c_price_azm_klient"] * $c_count, 2);
    $c_netto = $row["c_netto"];
    $с_pw = round($row["c_pw"] * $c_count, 2);
    $c_id_product = $row["c_id_product"];
    $c_id = $row["c_id"];

    //echo $c_id_product.'-'.$c_name_product.'-'.$c_price_azm_distr.'-'.$c_price_azm_klient.'-'.$с_pw.'-'.$c_netto.'<br>';

	echo "<tr>";
	echo "<td class='tabval' ></td>";
	echo "<td class='tabval' align='left'>" . $c_id_product ."</td>";
	echo "<td class='tabval' align='left'>" . $c_name_product . "</td>";
	echo "<td class='tabval' align='right'>" . $c_count ."</td>";
	echo "<td class='tabval' align='right'>" . $с_pw . "</td>";
	echo "<td class='tabval' align='right'>" . $c_price_azm_distr ."</td>";
	echo "<td class='tabval' align='right'>" . $c_price_azm_klient . "</td>";
	echo "<td class='tabval' align='right'><a href='qw.php?hiddenField2=" . $c_id_val .
        "'>Удалить</a></td>";

	echo "</tr>";
	echo "<tr valign='bottom'><td bgcolor='#ffffff' background='strichel.gif' colspan='10'><img src='blank.gif' width='1' height='1'></td></tr>";



    $с_pw_sum = $с_pw_sum + $с_pw;
    $c_price_azm_distr_sum = $c_price_azm_distr_sum + $c_price_azm_distr;
    $c_price_azm_klient_sum = $c_price_azm_klient_sum + $c_price_azm_klient;
}

?>
<tr>
    <td colspan="4">&nbsp;</td>

    <td  align='right'><? echo $с_pw_sum; ?></td>
    <td  align='right'><? echo $c_price_azm_distr_sum; ?></td>
    <td  align='right'><? echo $c_price_azm_klient_sum; ?></td>
	<td >&nbsp;</td>
  </tr>
   <tr valign="bottom"><td bgcolor="#fb7922" colspan="8"><img src="blank.gif" width="1" height="8"></td></tr>
</table>

<br>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
 <tr bgcolor="#f87820">
<td class="tabhead"><form id="form2" name="form2" method="GET" action="">
<img src="blank.gif" width="10" height="25"> Ввидите код клиента  <input name="code_client" type="text" size="5" />


 
   
  
  <input type="submit" name="Submit" value="Подтвердить заказ" />

 
</form>
</td>
</tr>
</table>



</body>
</html>
