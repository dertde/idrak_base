<?php
include "func_lib.php";
f_con_db('1');
f_head();
?>


<body>
<p>

<?php
//http://localhost/Felix/client_zakazi.php


$GET_tip = $_GET['tip'];
$GET_id_val = $_GET['id_val'];
$GET_client_id = $_GET['client_id'];





if ($GET_tip == 'dolg') {
    $sql = "SELECT c_id_product,c_count FROM ".$c_alfa."t_zakazi  WHERE ".$c_alfa."t_zakazi.c_id_val = " .
        $GET_id_val . " LIMIT 1;";

    $result = mysql_query($sql) or die("Could not connect: " . mysql_error());
    echo $sql;
    while ($row = mysql_fetch_assoc($result)) {
        $c_id_product = $row["c_id_product"];
        $c_count = $row["c_count"];

    }

    echo $c_id_product . ' ' . $c_count;
    $c_otvet = f_sklad_delete($c_id_product, $c_count);

    echo $c_otvet;

    $sql = "UPDATE ".$c_alfa."t_zakazi SET c_status = 'dolg' WHERE ".$c_alfa."t_zakazi.c_id_val = " . $GET_id_val .
        " LIMIT 1;";
    $result = mysql_query($sql) or die("Could not connect: " . mysql_error());
}
if ($GET_tip == 'oplaceno') {

    $sql = "UPDATE ".$c_alfa."t_zakazi SET c_status = 'oplaceno' , c_date='" . $kapt .
        "' WHERE ".$c_alfa."t_zakazi.c_id_val = " . $GET_id_val . " LIMIT 1;";
    $result = mysql_query($sql) or die("Could not connect: " . mysql_error());
}

if ($GET_tip == 'predoplata') {

    $sql = "UPDATE ".$c_alfa."t_zakazi SET c_status = 'predoplata' , c_date='" . $kapt .
        "' WHERE ".$c_alfa."t_zakazi.c_id_val = " . $GET_id_val . " LIMIT 1;";
    $result = mysql_query($sql) or die("Could not connect: " . mysql_error());
}


echo $GET_tip;
if ($GET_tip == 'vozvrat') {

    $c_id_product = f_select_one('c_id_product', 't_zakazi', 'c_id_val', $GET_c_id_val);
    $c_count = f_select_one('c_count', 't_zakazi', 'c_id_val', $GET_c_id_val);
    echo $c_id_product;
    $c_otvet = f_sklad_insert($c_id_product, $c_count);
    echo $c_otvet;


    $sql = "DELETE FROM .t_zakazi WHERE ".$c_alfa."t_zakazi.c_id_val = " . $GET_id_val .
        " LIMIT 1;";
    $result = mysql_query($sql) or die("Could not connect: " . mysql_error());
}

///////////////////////////////////////
if ($GET_tip == 'allpredoplata') {

    $sql = "UPDATE ".$c_alfa."t_zakazi SET c_status = 'predoplata' , c_date='" . $kapt .
        "' WHERE ".$c_alfa."t_zakazi.client_id = " . $GET_client_id .
        " and  c_status<>'oplaceno' order by c_date ;";
    $result = mysql_query($sql) or die("Could not connect: " . mysql_error());

    $e_status = '<p class="e_status_green">  На все текущие заказы проставлен статус: Предоплата </p>';
}

if ($GET_tip == 'alldolg') {

    $sql = "UPDATE ".$c_alfa."t_zakazi SET c_status = 'dolg' , c_date='" . $kapt .
        "' WHERE ".$c_alfa."t_zakazi.client_id = " . $GET_client_id .
        " and  c_status<>'oplaceno' order by c_date ;";
    $result = mysql_query($sql) or die("Could not connect: " . mysql_error());

    $e_status = '<p class="e_status_green">  На все текущие заказы проставлен статус: Долг </p>';
}
if ($GET_tip == 'alloplaceno') {

    $sql = "UPDATE ".$c_alfa."t_zakazi SET c_status = 'oplaceno' , c_date='" . $kapt .
        "' WHERE ".$c_alfa."t_zakazi.client_id = " . $GET_client_id .
        " and  c_status<>'oplaceno' order by c_date ;";
    $result = mysql_query($sql) or die("Could not connect: " . mysql_error());

    $e_status = '<p class="e_status_green">  На все текущие заказы проставлен статус: Оплачено </p>';
}
if ($GET_tip == 'allvozvrat') {

    $sql = "DELETE ".$c_alfa."t_zakazi WHERE client_id = " . $GET_client_id .
        " and  c_status<>'oplaceno'  ;";
    $result = mysql_query($sql) or die("Could not connect: " . mysql_error());

    $e_status = '<p class="e_status_green"> Все текущие заказы удалены </p>';
}


///////////////////////////////////////

$Update_POST = $_POST['Update'];
if ($Update_POST) {

    $POST_update_client_id = $_POST['update_client_id'];
    $POST_update_client_name = $_POST['update_client_name'];
    $POST_update_client_lastname = $_POST['update_client_lastname'];
    $POST_update_client_phone = $_POST['update_client_phone'];
    $POST_update_client_comment = $_POST['update_client_comment'];
    $POST_update_client_sponsor = $_POST['update_client_sponsor'];

    $f_today1 = f_today(1);
    $sql = "UPDATE ".$c_alfa."t_client SET client_date = DATE(" . $f_today1 .
        "), client_name = '" . $POST_update_client_name . "', client_lastname = '" . $POST_update_client_lastname .
        "', client_phone = '" . $POST_update_client_phone . "', client_comment = '" . $POST_update_client_comment .
        "', client_sponsor = '" . $POST_update_client_sponsor .
        "' WHERE ".$c_alfa."t_client.client_id = '" . $POST_update_client_id . "' LIMIT 1;";

    $result = mysql_query($sql) or die("Could not connect: " . mysql_error());

}


$search_id_client_POST = $_POST['search_id_client'];
$Search_POST = $_POST['Search'];
$client_id = $_GET['client_id'];

if (strlen($client_id) > 0) {
    $PO_id = $client_id;
}
if (strlen($POST_update_client_id) > 0) {
    $PO_id = $POST_update_client_id;
}
if (strlen($search_id_client_POST) > 0) {
    $PO_id = $search_id_client_POST;
}


if ($PO_id) {


    $sql = "SELECT * FROM ".$c_alfa."t_client WHERE client_id = " . $PO_id .
        " order by client_id  ";
    $result = mysql_query($sql) or die("Could not connect: " . mysql_error());
    while ($row = mysql_fetch_assoc($result)) {
        $row_client_id = $row["client_id"];
        $row_client_name = $row["client_name"];
        $row_client_lastname = $row["client_lastname"];
        $row_client_phone = $row["client_phone"];
        $row_client_comment = $row["client_comment"];
        $row_client_sponsor = $row["client_sponsor"];
    }

}


?>
</p>

<table border="0">
  <tr>
    <td><form id="form1" name="form1" method="post" action="client_zakazi.php">
      <fieldset  >
        <legend >
        <h3>&#1055;&#1086;&#1080;&#1089;&#1082; &#1044;&#1080;&#1089;&#1090;&#1088;&#1073;&#1100;&#1102;&#1090;&#1086;&#1088;&#1072;</h3>
        </legend>
        <table width="100%" border="0">
          <tr>
            <td>&#1055;&#1086;&#1080;&#1089;&#1082; &#1087;&#1086; ID
              <input  tabindex="16"  size="11" name="search_id_client" /></td>
            <td><input type="submit" name="Search" value="&#1055;&#1086;&#1080;&#1089;&#1082; " /></td>
            <td>&nbsp;&nbsp;&nbsp;</td>
          </tr>
        </table>
     
        </fieldset>
    </form></td>
  </tr>
</table>
<?php
if ($PO_id) {
    $sql = "SELECT * FROM ".$c_alfa."t_client WHERE client_id = " . $PO_id .
        " order by client_id ";
    $result = mysql_query($sql) or die("Could not connect: " . mysql_error());
    while ($row = mysql_fetch_assoc($result)) {
        $row_client_id = $row["client_id"];
        $row_client_name = $row["client_name"];
        $row_client_lastname = $row["client_lastname"];
        $row_client_phone = $row["client_phone"];
        $row_client_comment = $row["client_comment"];
        $row_client_sponsor = $row["client_sponsor"];
        echo '<br>Заказы клиента : ' . $row_client_name . '  ' . $row_client_lastname .
            '<br><br>';
    }

}
?>




<table border="1" bordercolor="#999999" cellpadding="5" cellspacing="0" >

      <?php


if ($PO_id) {
    //oplaceno
    echo '<tr>';
    echo '<td colspan="7"><strong>Оплаченный товар:</strong></td>';
    echo '</tr>';

    $sql = "SELECT c_id_val,c_id_product, c_name_product, c_pw, c_price_azm_distr, c_date, c_count, c_status,client_id FROM ".$c_alfa."t_zakazi WHERE client_id = " .
        $PO_id . " and c_status ='oplaceno' order by c_date and month(c_date)=month('" .
        $kapt . "')";
    $result = mysql_query($sql) or die("Could not connect: " . mysql_error());
    $с_pw_sum = 0;
    $c_price_azm_distr_sum = 0;
    while ($row = mysql_fetch_assoc($result)) {
        $c_id_val = $row["c_id_val"];
        $c_count = $row["c_count"];
        $client_id = $row["client_id"];
        $c_id_product = $row["c_id_product"];
        $c_name_product = $row["c_name_product"];
        $с_pw = round($row["c_pw"] * $c_count, 2);
        $c_price_azm_distr = round($row["c_price_azm_distr"] * $c_count, 2);

        $c_status = $row["c_status"];
        $c_date = $row["c_date"];
        $с_pw_sum += $с_pw;
        $c_price_azm_distr_sum += $c_price_azm_distr;


        echo "<tr>	<td>" . $c_date . "</td><td>" . $c_id_product . "</td><td>" . $c_name_product .
            "</td><td align='right'>" . $с_pw . "</td><td align='right'>" . $c_price_azm_distr .
            "</td><td align='right'>" . $c_count . "</td><td>" . $c_status . " </td></tr>";
    }
}

echo "<tr><td colspan='3'>" . "</td><td>" . $с_pw_sum . "</td><td>" . $c_price_azm_distr_sum .
    "</td><td colspan='3'></td></tr>";
?>
        </table>
        <br />
        <br />
<table border="1" bordercolor="#999999" cellpadding="5" cellspacing="0" >

      <?php


if ($PO_id) {
    echo '<tr>';
    echo '<td colspan="8"><strong>Заказы:</strong></td>';
    echo '</tr>';

    $sql = "SELECT c_id_val,c_id_product, c_name_product, c_pw, c_price_azm_distr, c_date, c_count, c_status,client_id FROM ".$c_alfa."t_zakazi WHERE client_id = " .
        $PO_id . " and c_status<>'oplaceno' order by c_date";
    $result = mysql_query($sql) or die("Could not connect: " . mysql_error());
    $с_pw_sum = 0;
    $c_price_azm_distr_sum = 0;
    while ($row = mysql_fetch_assoc($result)) {
        $c_id_val = $row["c_id_val"];
        $c_count = $row["c_count"];
        $client_id = $row["client_id"];
        $c_id_product = $row["c_id_product"];
        $c_name_product = $row["c_name_product"];
        $с_pw = round($row["c_pw"] * $c_count, 2);
        $c_price_azm_distr = round($row["c_price_azm_distr"] * $c_count, 2);

        $c_status = $row["c_status"];
        $c_date = $row["c_date"];
        $с_pw_sum += $с_pw;
        $c_price_azm_distr_sum += $c_price_azm_distr;

        echo "<tr>	<td>" . $c_date . "</td><td>" . $c_id_product . "</td><td>" . $c_name_product .
            "</td><td align='right'>" . $с_pw . "</td><td align='right'>" . $c_price_azm_distr .
            "</td><td align='right'>" . $c_count . "</td><td>" . $c_status . "</td><td> ";
        if ($c_status <> 'dolg') {
            echo "<a href='client_zakazi.php?tip=dolg&id_val=" . $c_id_val . "&client_id=" .
                $client_id . "'>Долг</a> ";
        }
        echo "<a href='client_zakazi.php?tip=oplaceno&id_val=" . $c_id_val .
            "&client_id=" . $client_id . "'> Оплачено </a>" .
            "<a href='client_zakazi.php?tip=predoplata&id_val=" . $c_id_val . "&client_id=" .
            $client_id . "'> Предоплата </a>" .
            " <a href='client_zakazi.php?tip=vozvrat&id_val=" . $c_id_val . "&client_id=" .
            $client_id . "'> Возврат </a> </td></tr>";
    }
}


echo "<tr><td colspan='3'>" . "</td><td>" . $с_pw_sum . "</td><td>" . $c_price_azm_distr_sum .
    "</td><td colspan='3'></td></tr>";

echo "<tr><td colspan='8'> " .
    "<a href='client_zakazi.php?tip=allvozvrat&client_id=" . $client_id .
    "'> Все Возврат </a> " . " <a href='client_zakazi.php?tip=alldolg&client_id=" .
    $client_id . "'> Все Долг</a> " .
    " <a href='client_zakazi.php?tip=allpredoplata&client_id=" . $client_id .
    "'> Все Предоплата </a> " .
    " <a href='client_zakazi.php?tip=alloplaceno&client_id=" . $client_id .
    "'> Все Оплата </a> ";
echo "<tr></td> ";
?>

        </table>
        <?php print ($e_status . '<br>' . $e_status1) ?>
</body>
</html>
