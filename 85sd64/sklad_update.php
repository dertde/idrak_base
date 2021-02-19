<?php
include "func_lib.php";
f_con_db('1');
f_head();
?>
<?php

$f_today1 = f_today(1);

@$c_id_product_get = $_POST['c_id_product'];


if (@$_POST['c_id_product1']) {
 $c_id_product_POST = $_POST['c_id_product1'];
 $c_name_product = $_POST['c_name_product'];
 $c_comment_product = $_POST['c_comment_product'];
 $c_netto = $_POST['c_netto'];
 $c_pw = $_POST['c_pw'];
 $c_price_ukr = $_POST['c_price_ukr'];
 $c_price_azm_distr = $_POST['c_price_azm_distr'];
 $c_price_azm_klient = $_POST['c_price_azm_klient'];
 $c_ves = $_POST['c_ves'];
 $c_travel = $_POST['c_travel'];
 $c_pribil = $_POST['c_pribil'];

 $sql = "UPDATE ".$c_alfa."t_sklad SET c_name_product='" . $c_name_product .
 "',c_comment_product='" . $c_comment_product . "',c_netto='" . $c_netto .
 "',c_pw='" . $c_pw . "',c_price_ukr='" . $c_price_ukr . "',c_price_azm_distr='" .
 $c_price_azm_distr . "',c_price_azm_klient='" . $c_price_azm_klient .
 "',c_date='" . $c_date . "',c_ves='" . $c_ves . "' where c_id_product = " . $c_id_product_POST;
 $result = mysql_query($sql) or die("Could not connect: " . mysql_error());
 $c_id_product_get = $c_id_product_POST;
}

if ($c_id_product_get) {
 if (strlen($c_id_product_get) == 1) {
 $c_id_product_get = '00000' . $c_id_product_get;
 }
 if (strlen($c_id_product_get) == 2) {
 $c_id_product_get = '0000' . $c_id_product_get;
 }
 if (strlen($c_id_product_get) == 3) {
 $c_id_product_get = '000' . $c_id_product_get;
 }
 if (strlen($c_id_product_get) == 4) {
 $c_id_product_get = '00' . $c_id_product_get;
 }
 if (strlen($c_id_product_get) == 5) {
 $c_id_product_get = '0' . $c_id_product_get;
 }


 $sql = "SELECT c_id_product, c_name_product, c_comment_product, c_netto, c_pw, c_price_ukr, c_price_azm_distr, c_price_azm_klient, c_date, c_ves, c_travel,c_pribil FROM ".$c_alfa."t_sklad where c_id_product=" .
 $c_id_product_get . " LIMIT 1 ";

 $result = mysql_query($sql) or die("Could not connect: " . mysql_error());

 while ($row = mysql_fetch_assoc($result)) {

 $row_c_date = $row["c_date"];
 $row_c_id_product = $row["c_id_product"];
 $row_c_name_product = $row["c_name_product"];
 $row_c_comment_product = $row["c_comment_product"];
 $row_c_netto = $row["c_netto"];
 $row_c_pw = $row["c_pw"];
 $row_c_price_ukr = $row["c_price_ukr"];
 $row_c_price_azm_distr = $row["c_price_azm_distr"];
 $row_c_price_azm_klient = $row["c_price_azm_klient"];
 $row_c_ves = $row["c_ves"];
 $row_c_travel = $row["c_travel"];
 $row_c_pribil = $row["c_pribil"];
 }
}


?>

<body>







<table border="0" cellpadding="0" cellspacing="0" width="100%">
 <tr bgcolor="#f87820">
<td class="tabhead"> <form id="form1" name="form1" method="post" action="">
<img src="blank.gif" width="10" height="25"> Axtarış кода продукта

 <input type="text" name="c_id_product" />
 <input type="submit" name="Submit" value="Axtarış" />
</form>
</td>
</tr>
</table>

<br>







 <form id="form1" name="form1" method="post" action="">
 
 
 <fieldset>
 <legend>
 <h3>Товар на Anbarе - Изменение</h3>
 </legend>
 <form id="form1" name="form2" method="post" action="">
 <table cellspacing="3" cellpadding="0">
 <tbody>
 <tr>
 <td align="left"><div align="center"></div></td>
 </tr>
 <tr>
 <td align="left"><table cellspacing="3" cellpadding="0">
 <col width="94" />
 <col width="64" />
 <tr>
 <td width="130">Код продукта</td>
 <td width="147"><input name="c_id_product1" type="text" id="textfield" value="<?php echo ($row_c_id_product); ?>" /> 
  </td>
 <td width="193"><em>шестизначное поле пример - 000001</em></td>
 </tr>
 <tr>
 <td>Başlıq</td>
 <td><input name="c_name_product" type="text" id="textfield2" value="<?php echo ($row_c_name_product); ?>" /></td>
 <td><em>пример - L.O.C</em></td>
 </tr>
 <tr>
 <td>Комментарии</td>
 <td><input name="c_comment_product" type="text" id="textfield3" value="<?php echo ($row_c_comment_product); ?>" /></td>
 <td><em>пример - Чистящее средство</em></td>
 </tr>
 <tr>
 <td>Вес обозначение</td>
 <td><input name="c_netto" type="text" id="textfield4" value="<?php echo ($row_c_netto); ?>" /></td>
 <td><em>пример - 500 мл</em></td>
 </tr>
 <tr>
 <td>Балы</td>
 <td><input name="c_pw" type="text" id="textfield5" value="<?php echo ($row_c_pw); ?>" /></td>
 <td><em>пример - 4.29</em></td>
 </tr>
 <tr>
 <td>Цена Укр. в манат</td>
 <td><input name="c_price_ukr" type="text" id="textfield6" value="<?php echo ($row_c_price_ukr); ?>"/></td>
 <td><em>пример - 5.20</em></td>
 </tr>
 <tr>
 <td>Цена Дистрбьюторская</td>
 <td><input name="c_price_azm_distr" type="text" id="textfield7" value="<?php echo ($row_c_price_azm_distr); ?>" /></td>
 <td><em>пример - 9.42</em></td>
 </tr>
 <tr>
 <td>Цена Клиенсткая</td>
 <td><input name="c_price_azm_klient" type="text" id="textfield8" value="<?php echo ($row_c_price_azm_klient); ?>" /></td>
 <td><em>пример - 12.24</em></td>
 </tr>
 <tr>
 <td>Вес в кг</td>
 <td><input name="c_ves" type="text" id="textfield9" value="<?php echo ($row_c_ves); ?>" /></td>
 <td><em>пример - 0.6</em></td>
 </tr>
 <tr>
 <td>Цена за доставку</td>
 <td><input name="c_travel" type="text" id="textfield10" value="<?php echo ($row_c_travel); ?>" /></td>
 <td><em>Это поле подсчитывается автоматически, но может быть измененно</em></td>
 </tr>
 <tr>
 <td>Прибыль</td>
 <td><input name="c_pribil" type="text" id="textfield11" value="<?php echo ($row_c_pribil); ?>" /></td>
 <td><em>Это поле подсчитывается автоматически, но может быть измененно</em></td>
 </tr>
 <tr>
 <td colspan="3">&nbsp;</td>
 </tr>
 <tr>
 <td colspan="3" align="center"><input type="submit" name="Submit" value="Ввести" /></td>
 </tr>
 </table></td>
 </tr>
 <tr>
 <td align="center">&nbsp;</td>
 </tr>
 </tbody>
 </table>
 </form>
 </fieldset>
 </form></td>
 </tr>
 </tbody>
</table>
<br />
</body>
</html>
