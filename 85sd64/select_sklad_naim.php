<?php
include "func_lib.php";
f_con_db('1');
f_head();
?>

<body>
<?php




$c_id_product = $_GET['c_id_product'];


if (strlen($c_id_product) == 1) {
    $c_id_product = '00000' . $c_id_product;
}
if (strlen($c_id_product) == 2) {
    $c_id_product = '0000' . $c_id_product;
}
if (strlen($c_id_product) == 3) {
    $c_id_product = '000' . $c_id_product;
}
if (strlen($c_id_product) == 4) {
    $c_id_product = '00' . $c_id_product;
}
if (strlen($c_id_product) == 5) {
    $c_id_product = '0' . $c_id_product;
}






?>



<table border="0" cellpadding="0" cellspacing="0" width="100%">
 <tr bgcolor="#f87820">
<td class="tabhead">
<form id="form1" name="form1" method="get" action="">
<img src="blank.gif" width="10" height="25"> Axtarış по коду
  <input type="text" name="c_id_product" size="15"/>Axtarış по названию
  <input  type="text" name="c_name_product" size="15" />
  <input type="submit" name="Submit" value="Submit" />
</form>
</td>
</tr>
</table>
<br />

<table border="0" cellpadding="0" cellspacing="0" >
 <tr bgcolor="#f87820">
 <td><img src="blank.gif" width="10" height="25"></td>
 <td class="tabhead"><img src="blank.gif" width="65" height="6"><br><b>Код</b></td>
 <td class="tabhead"><img src="blank.gif" width="85" height="6"><br><b>Başlıq</b></td>
 <td class="tabhead" align='right'><img src="blank.gif" width="55" height="6"><br><b>Балы</b></td>
 <td class="tabhead" align='right'><img src="blank.gif" width="85" height="6"><br><b>Ц.Дистрб.</b></td>
<?php


$c_name_product = $_GET['c_name_product'];





if ((strlen($c_name_product) > 0) or (strlen($c_id_product) > 0)) {
    $sql = "SELECT c_id_product, c_name_product,  c_pw,  c_price_azm_distr   FROM  ".$c_alfa."t_sklad
WHERE c_name_product LIKE '" . $c_name_product . "' or c_name_product LIKE '" .
        $c_name_product . "' or c_name_product LIKE '%" . $c_name_product .
        "' or c_name_product LIKE '%" . $c_name_product . "' or c_name_product LIKE '" .
        $c_name_product . "%' or c_name_product LIKE '" . $c_name_product .
        "%' or c_name_product LIKE '%" . $c_name_product .
        "%' or c_name_product LIKE '%" . $c_name_product .
        "%' order by c_id_product LIMIT 0, 30 ";

    if ($c_id_product) {

        $sql = "SELECT c_id_product, c_name_product,  c_pw,  c_price_azm_distr   FROM  ".$c_alfa."t_sklad
WHERE c_id_product  =" . $c_id_product . " ";

    }


    $result = mysql_query($sql) or die("Could not connect: " . mysql_error());


    while ($row = mysql_fetch_assoc($result)) {

        $c_id_product = $row["c_id_product"];
        $c_name_product = $row["c_name_product"];

        $c_pw = $row["c_pw"];
        $c_price_azm_distr = $row["c_price_azm_distr"];

 echo "<tr>";
	echo "<td class='tabval' ></td>";
	echo "<td class='tabval' >" . $c_id_product . "</td>";
	echo "<td class='tabval' >" . $c_name_product ."</td>";
	echo "<td class='tabval' align='right'>" . $c_pw . "</td>";
	echo "<td class='tabval' align='right'>" . $c_price_azm_distr . "</td>";
	echo "</tr>";
	echo "<tr valign='bottom'><td bgcolor='#ffffff' background='strichel.gif' colspan='10'><img src='blank.gif' width='1' height='1'></td></tr>";

    }

}

?>
 <tr valign="bottom"><td bgcolor="#fb7922" colspan="10"><img src="blank.gif" width="1" height="8"></td></tr>
</table>





</body>
</html>
