<?php
include "func_lib.php";
f_con_db('1');
f_head();
?>
<body>
<?php


$GET_c_product_id = $_GET['c_product_id'];
$GET_c_count_html = $_GET['c_count_html'];
$GET_code_client = $_GET['code_client'];
$GET_Submit = $_GET['submiter'];

$get_client_id = $_GET['client_id'];

$GET_c_status = $_GET['c_status'];
$GET_c_id_val = $_GET['c_id_val'];

if ($GET_c_status == 'in') {


    $c_id_product = f_select_one('c_id_product', 't_za_ob', 'c_id_val', $GET_c_id_val);
    $c_count = f_select_one('c_count', 't_za_ob', 'c_id_val', $GET_c_id_val);
    echo $c_id_product;
    $c_otvet = f_sklad_delete($c_id_product, $c_count);
    echo $c_otvet;

    $sql = "DELETE FROM ".$c_alfa."t_za_ob WHERE c_id_val =" . $GET_c_id_val . "";
    $result = mysql_query($sql) or die("obmen.php 1: " . mysql_error());
}
if ($GET_c_status == 'out') {


    $c_id_product = f_select_one('c_id_product', 't_za_ob', 'c_id_val', $GET_c_id_val);
    $c_count = f_select_one('c_count', 't_za_ob', 'c_id_val', $GET_c_id_val);
    echo $c_id_product;
    $c_otvet = f_sklad_insert($c_id_product, $c_count);
    echo $c_otvet;
    $sql = "DELETE FROM ".$c_alfa."t_za_ob WHERE c_id_val =" . $GET_c_id_val . "";
    $result = mysql_query($sql) or die("obmen.php 2: " . mysql_error());
}


if ($GET_code_client > 0) {

    $get_client_id = $GET_code_client;

}


if ($GET_code_client <> '--') {
    
    

    if (strlen($GET_c_product_id) == 1) {
        $GET_c_product_id = '00000' . $GET_c_product_id;
    }
    if (strlen($GET_c_product_id) == 2) {
        $GET_c_product_id = '0000' . $GET_c_product_id;
    }
    if (strlen($GET_c_product_id) == 3) {
        $GET_c_product_id = '000' . $GET_c_product_id;
    }
    if (strlen($GET_c_product_id) == 4) {
        $GET_c_product_id = '00' . $GET_c_product_id;
    }
    if (strlen($GET_c_product_id) == 5) {
        $GET_c_product_id = '0' . $GET_c_product_id;
    }


    $sql = "insert into ".$c_alfa."t_za_ob " . "(SELECT ''," .
        "c_id_product , c_name_product , c_comment_product , c_netto , " .
        "c_pw , c_price_ukr , c_price_azm_distr , c_price_azm_klient , '" . $kapt .
        "' , c_ves , c_travel ,c_pribil,'" . $GET_c_count_html . "'" . ",'" . $GET_code_client .
        "','" . $GET_Submit . "' FROM " . "".$c_alfa."t_sklad WHERE c_id_product = '" . $GET_c_product_id .
        "')";
    $result = mysql_query($sql) or die("obmen.php 3: " . mysql_error());

    if ($GET_Submit == 'out') {
        $c_otvet = f_sklad_delete($GET_c_product_id, $GET_c_count_html);
        echo $c_otvet;
    }
    if ($GET_Submit == 'in') {
        $c_otvet = f_sklad_insert($GET_c_product_id, $GET_c_count_html);
        echo $c_otvet;
    }


}


if ($GET_hiddenField2 <> '') {
    $sql = "DELETE FROM ".$c_alfa."t_sk_in WHERE c_id =" . $GET_hiddenField2 . "";
    $result = mysql_query($sql) or die("obmen.php 4: " . mysql_error());

}




?>

<form id="form1" name="form1" method="get" action="">
  <input type="text" name="c_product_id" />
  <input name="c_count_html" type="text" value="1.00" size="5" />
            <select name="code_client">
              <option value=0>--</option>
              <?php
$sql = "SELECT c_id_ob,c_name_ob FROM ".$c_alfa."t_sk_ob  ";

$result = mysql_query($sql) or die("obmen.php 5: " . mysql_error());

while ($row = mysql_fetch_assoc($result)) {
    $row_c_id_ob = $row["c_id_ob"];
    $row_c_name_ob = $row["c_name_ob"];

    if ($GET_code_client == $row_c_id_ob) {

        $sel = ' selected="selected" ';
    }
    echo "<option value='" . $row_c_id_ob . "'" . $sel . ">" . $row_c_name_ob .
        "</option>";
    $sel = '';
}


?>                
              </select>   
               <select name="submiter">
              <option value="in">Принять</option>
              <option value="out">Отдать</option>
              </select> 
  <input type="submit" name="Send"  />
</form>



<table border="1" bordercolor="#999999" cellpadding="5" cellspacing="0" ><tr>
              <?php
$sql = "SELECT c_id_ob,c_name_ob FROM ".$c_alfa."t_sk_ob  ";
$result = mysql_query($sql) or die("obmen.php 6: " . mysql_error());
while ($row = mysql_fetch_assoc($result)) {
    $row_c_id_ob = $row["c_id_ob"];
    $row_c_name_ob = $row["c_name_ob"];

    if ($get_client_id == $row_c_id_ob) {

        $alu = '(*)';
    }
    echo "<td><a href='obmen.php?client_id=" . $row_c_id_ob . "'>" . $row_c_name_ob .
        "</a> " . $alu . "</td>";
    $alu = '';
}


?>
</tr></table >
<br> 
<table >

<tr><td align='center'>Получено</td><td align='center'>Долг</td></tr>

<tr><td>

<table border="1" bordercolor="#999999" cellpadding="5" cellspacing="0" >


 <tr>
    <td align="center">Tarix</td>
    <td align="center">Код </td>
    <td align="center">Назв.</td>
    <td align="center">Кол-во</td>
    <td align="center">Вес в кг</td>
    <td align="center">Цена</td>
     <td align="center">&nbsp;</td>

  </tr>


<?php
if (strlen($get_client_id) < 1) {
    return;
}

$sql = "SELECT c_id_val,c_id_product,c_count, c_name_product, c_comment_product, 
c_netto, c_pw, c_price_ukr, c_price_azm_distr, c_price_azm_klient, 
c_date, c_ves, c_travel,c_pribil,client_id,c_status FROM ".$c_alfa."t_za_ob where c_status= 'in' and client_id='" .
    $get_client_id . "'";

$result = mysql_query($sql) or die("obmen.php 7: " . mysql_error());


$c_ves_sum = 0;
$c_pw_sum = 0;
$c_price_ukr_sum = 0;
$c_price_azm_distr_sum = 0;
$c_travel_sum = 0;
$c_pribil_sum = 0;
$c_count_sum = 0;

while ($row = mysql_fetch_assoc($result)) {

    $c_id_product = $row["c_id_product"];
    $c_name_product = substr($row["c_name_product"], 0, 15) . '...';

    $c_count = $row["c_count"];
    $c_date = $row["c_date"];
    $c_id_val = $row["c_id_val"];
    $c_ves = $c_count * $row["c_ves"];
    $c_pw = $c_count * $row["c_pw"];
    $c_price_ukr = $c_count * $row["c_price_ukr"];
    $c_price_azm_distr = $c_count * $row["c_price_azm_distr"];
    $c_travel = $c_count * $row["c_travel"];
    $c_pribil = $c_count * $row["c_pribil"];

    $c_client_id = $row["client_id"];
    $c_status = $row["c_status"];


    echo "<tr><td>" . $c_date . "</td><td>" . $c_id_product . "</td><td>" . $c_name_product .
        "</td><td align='right'>" . $c_count . "</td><td align='right'>" . $c_ves .
        "</td><td align='right'>" . $c_price_azm_distr .
        "</td><td><a href='obmen.php?client_id=" . $c_client_id . "&c_status=" . $c_status .
        "&c_id_val=" . $c_id_val . "'>Удл</a></td></tr>";


    $c_ves_sum = $c_ves_sum + $c_ves;
    $c_pw_sum = $c_pw_sum + $c_pw;
    $c_price_ukr_sum = $c_price_ukr_sum + $c_price_ukr;
    $c_price_azm_distr_sum = $c_price_azm_distr_sum + $c_price_azm_distr;
    $c_travel_sum = $c_travel_sum + $c_travel;
    $c_pribil_sum = $c_pribil_sum + $c_pribil;

}

?>
<tr>
    <td colspan="3">&nbsp;</td>

    <td align='right'><? echo $c_ves_sum;
$c_ves_in = $c_ves_sum; ?></td>

        <td align='right'><? echo $c_price_azm_distr_sum;
$c_price_azm_distr_in = $c_price_azm_distr_sum;
?></td>
 
                   
	
  </tr>
</table>

</td><td>


<table border="1" bordercolor="#999999" cellpadding="5" cellspacing="0" >


 <tr>
    <td align="center">Tarix</td>
    <td align="center">Код </td>
    <td align="center">Назв.</td>
    <td align="center">Кол-во</td>
    <td align="center">Вес в кг</td>
   <td align="center">Цена</td>
   <td align="center">&nbsp;</td>
  

  </tr>


<?php
$sql = "SELECT c_id_val,c_id_product,c_count, c_name_product, c_comment_product, c_netto, c_pw,
 c_price_ukr, c_price_azm_distr, c_price_azm_klient, c_date, c_ves,
  c_travel,c_pribil,client_id,c_status FROM ".$c_alfa."t_za_ob where c_status= 'out' and client_id='" .
    $get_client_id . "'";
$result = mysql_query($sql) or die("obmen.php 8: " . mysql_error());


$c_ves_sum = 0;
$c_pw_sum = 0;
$c_price_ukr_sum = 0;
$c_price_azm_distr_sum = 0;
$c_travel_sum = 0;
$c_pribil_sum = 0;
$c_count_sum = 0;

while ($row = mysql_fetch_assoc($result)) {

    $c_id_product = $row["c_id_product"];
    $c_id_val = $row["c_id_val"];

    $c_name_product = substr($row["c_name_product"], 0, 15) . '...';

    $c_count = $row["c_count"];

    $c_ves = $c_count * $row["c_ves"];
    $c_pw = $c_count * $row["c_pw"];
    $c_price_ukr = $c_count * $row["c_price_ukr"];
    $c_price_azm_distr = $c_count * $row["c_price_azm_distr"];
    $c_travel = $c_count * $row["c_travel"];
    $c_pribil = $c_count * $row["c_pribil"];

    $c_client_id = $row["client_id"];
    $c_status = $row["c_status"];


    echo "<tr><td>" . $c_date . "</td><td>" . $c_id_product . "</td><td>" . $c_name_product .
        "</td><td align='right'>" . $c_count . "</td><td align='right'>" . $c_ves .
        "</td><td align='right'>" . $c_price_azm_distr .
        "</td> <td><a href='obmen.php?client_id=" . $c_client_id . "&c_status=" . $c_status .
        "&c_id_val=" . $c_id_val . "'>Удл</a></td></tr>";


    $c_ves_sum = $c_ves_sum + $c_ves;
    $c_pw_sum = $c_pw_sum + $c_pw;
    $c_price_ukr_sum = $c_price_ukr_sum + $c_price_ukr;
    $c_price_azm_distr_sum = $c_price_azm_distr_sum + $c_price_azm_distr;
    $c_travel_sum = $c_travel_sum + $c_travel;
    $c_pribil_sum = $c_pribil_sum + $c_pribil;

}

?>
<tr>
    <td colspan="3">&nbsp;</td>

    <td align='right'><? echo $c_ves_sum;
$c_ves_out = $c_ves_sum;
?></td>

        <td align='right'><? echo $c_price_azm_distr_sum;
$c_price_azm_distr_out = $c_price_azm_distr_sum;

?></td>
 
                   
	
  </tr>
</table>
</td></tr>
<tr><td align='center'> Вес : <? echo $c_ves_in - $c_ves_out;
echo ' Сумма : ';
echo $c_price_azm_distr_in - $c_price_azm_distr_out; ?></td></tr>
</tr>
<table >


<p>&nbsp;</p>
</body>
</html>
