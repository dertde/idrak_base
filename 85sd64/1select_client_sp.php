<?php
include "func_lib.php";
f_con_db('1');
f_head();
?>

<body>
<?php
//
//print_r($_GET);
//print_r($_POST);


$c_id_product = $_GET['c_id_product'];







?>

<?php
//
//<table border="0" cellpadding="0" cellspacing="0" width="100%">
// <tr bgcolor="#f87820">
//<td class="tabhead">
//<form id="form1" name="form1" method="get" action="">
//<img src="blank.gif" width="10" height="25"> Axtarış по коду
//  <input type="text" name="c_id_product" size="15"/>Axtarış по названию
//  <input  type="text" name="c_name_product" size="15" />
//  <input type="submit" name="Submit" value="Submit" />
//</form>
//</td>
//</tr>
//</table>
//<br />
?>

<table border="0" cellpadding="0" cellspacing="0" >
 <tr bgcolor="#f87820">
 <td><img src="blank.gif" width="10" height="25"></td>
 <td class="tabhead"><img src="blank.gif" width="65" height="6"><br><b>A.S.A </b></td>
 <td class="tabhead"><img src="blank.gif" width="85" height="6"><br><b>&nbsp;Vəzifə</b></td>
 <td class="tabhead" align='right'><img src="blank.gif" width="55" height="6"><br><b>Şöbə</b></td>
  <td class="tabhead" align='right'><img src="blank.gif" width="55" height="6"><br><b>Telefon</b></td>
 <td class="tabhead" align='right'><img src="blank.gif" width="55" height="6"><br><b> </b></td>
  <td class="tabhead" align='right'><img src="blank.gif" width="55" height="6"><br><b> </b></td>
<?php


$c_name_product = $_GET['c_name_product'];





//if ((strlen($c_name_product) > 0) or (strlen($c_id_product) > 0)) {
//    $sql = "SELECT c_id_product, c_name_product,  c_pw,  c_price_azm_distr   FROM  ".$c_alfa."t_sklad
//WHERE c_name_product LIKE '" . $c_name_product . "' or c_name_product LIKE '" .
//        $c_name_product . "' or c_name_product LIKE '%" . $c_name_product .
//        "' or c_name_product LIKE '%" . $c_name_product . "' or c_name_product LIKE '" .
//        $c_name_product . "%' or c_name_product LIKE '" . $c_name_product .
//        "%' or c_name_product LIKE '%" . $c_name_product .
//        "%' or c_name_product LIKE '%" . $c_name_product .
//        "%' order by c_id_product LIMIT 0, 30 ";

   // if ($c_id_product) {

        $sql = "SELECT c_id,c_name,c_lastname,c_phone,c_department   FROM people order by  c_name";

   // }


    $result = mysql_query($sql) or die("Could not connect: " . mysql_error());


    while ($row = mysql_fetch_assoc($result)) {

$c_id_val = $row["c_id"];
$c_name = $row["c_name"];
$c_lastname = $row["c_lastname"];
$row_c_department = $row["c_department"];
$c_phone = $row["c_phone"];
        

$c_lastname = substr( $c_lastname,0,25);

 echo "<tr>";
	echo "<td class='tabval' ></td>";
	echo "<td class='tabval' >" . $c_name . "</td>";
	echo "<td class='tabval' >&nbsp;". $c_lastname ."</td>";

	$row_c_department1= 	f_get_c_department($row_c_department);
$row_c_department1 = substr( $row_c_department1,0,25);
		echo "<td class='tabval' >" . $row_c_department1 . "</td>";
	echo "<td class='tabval' >" . $c_phone . "</td>";
       echo "<td class='tabval' >" ."<a href='1client_zakazi_777.php?Search=" . $c_id_val ."'>&nbsp;Məhsul</a>" . "</td>";
    echo "<td class='tabval' >" ."<a href='1insert_tovar.php?Search=" . $c_id_val ."'>&nbsp;Əlavə et </a>" . "</td>";

	echo "</tr>";
	echo "<tr valign='bottom'><td bgcolor='#ffffff' background='strichel.gif' colspan='10'><img src='blank.gif' width='1' height='1'></td></tr>";

   

}

?>
 <tr valign="bottom"><td bgcolor="#fb7922" colspan="10"><img src="blank.gif" width="1" height="8"></td></tr>
</table>





</body>
</html>
