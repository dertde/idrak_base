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
    $result = mysql_query($sql) or die("Could not connect: " . mysql_error());

    while ($row = mysql_fetch_assoc($result)) {
        $c_a1801 = $row["sum(c_price_azm_distr)"];
    }


    $sql = "update ".$c_alfa."t_account set a1801= a1801+" . $c_a1801 . " where client_id=" . $GET_code_client .
        "";
    $result = mysql_query($sql) or die("Could not connect: " . mysql_error());

    $sql = "INSERT INTO  ".$c_alfa."t_zakazi( SELECT c_id_product,c_name_product,c_pw,c_price_azm_distr,'" .
        $kapt . "',c_count,'" . $GET_code_client . "','zakaz' from ".$c_alfa."t_sklad_temp) ";
    //$sql = "insert into ".$c_alfa."t_zakazi c_id_product,c_name_product, c_pw,c_price_azm_distr,c_date,c_count, client_id,c_status"


    $result = mysql_query($sql) or die("Could not connect: " . mysql_error());

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
    $sql = "DELETE FROM ".$c_alfa."t_sklad_temp WHERE c_id =" . $GET_hiddenField2 . "";
    $result = mysql_query($sql) or die("Could not connect: " . mysql_error());

}


if ($GET_textfield <> '') {
    $sql = "insert into ".$c_alfa."t_sklad_temp (SELECT *,'" . $GET_textfield1 .
        "' FROM ".$c_alfa."t_sklad WHERE c_id_product= '" . $GET_textfield . "')";
    $result = mysql_query($sql) or die("Could not connect: " . mysql_error());
}

?>
<h1><?php echo $GET_textfield; ?></h1>
<form id="form1" name="form1" method="get" action="">
  <input type="text" name="textfield" /><input name="textfield1" type="text" value="1.00" size="5" />
  <input type="submit" name="Submit" value="Submit" />
</form>
<table  border="1" cellpadding="5" cellspacing="5" >
<?php
$sql = "SELECT c_id,c_name_product,c_id_product,c_comment_product,c_netto,c_pw,c_price_azm_distr,c_price_azm_klient,c_count FROM ".$c_alfa."t_sklad_temp WHERE 1 LIMIT 0, 30 ";
$result = mysql_query($sql) or die("Could not connect: " . mysql_error());

$с_pw_sum = 0;
$c_price_azm_distr_sum = 0;
$c_price_azm_klient_sum = 0;
while ($row = mysql_fetch_assoc($result)) {
    $c_count = $row["c_count"];
    $c_name_product = $row["c_name_product"];
    $c_price_azm_distr = round($row["c_price_azm_distr"] * $c_count, 2);
    $c_price_azm_klient = round($row["c_price_azm_klient"] * $c_count, 2);
    $c_netto = $row["c_netto"];
    $с_pw = round($row["c_pw"] * $c_count, 2);
    $c_id_product = $row["c_id_product"];
    $c_id = $row["c_id"];

    //echo $c_id_product.'-'.$c_name_product.'-'.$c_price_azm_distr.'-'.$c_price_azm_klient.'-'.$с_pw.'-'.$c_netto.'<br>';

    echo "<tr>	<td>" . $c_id_product . "</td><td>" . $c_name_product . "</td><td>" .
        $c_count . "</td><td>" . $с_pw . "</td> <td>" . $c_price_azm_distr . "</td><td>" .
        $c_price_azm_klient . "</td> <td><a href='qw.php?hiddenField2=" . $c_id .
        "'>Удалить</a></td></tr>";


    $с_pw_sum = $с_pw_sum + $с_pw;
    $c_price_azm_distr_sum = $c_price_azm_distr_sum + $c_price_azm_distr;
    $c_price_azm_klient_sum = $c_price_azm_klient_sum + $c_price_azm_klient;
}

?>
<tr>
    <td colspan="3">&nbsp;</td>

    <td><? echo $с_pw_sum; ?></td>
    <td><? echo $c_price_azm_distr_sum; ?></td>
    <td><? echo $c_price_azm_klient_sum; ?></td>
	<td >&nbsp;</td>
  </tr>
</table>

<form id="form2" name="form2" method="GET" action="">
  Ввидите код клиента для потдтверждения заказа
    <input name="code_client" type="text" size="5" />
  
  <input type="submit" name="Submit" value="Подтвердить" />

 
</form>
<p>&nbsp;</p>
</body>
</html>
