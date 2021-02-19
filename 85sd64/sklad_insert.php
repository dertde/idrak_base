<?php
include "func_lib.php";
f_con_db('1');
f_head();
?>

<?php

$f_today1 = f_today(1);

$c_id_product_get = $_POST['c_id_product'];
$c_message = "";

if ($_POST['c_id_product1']) {
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

    $Cena_za_dostavku = f_select_one('c_const_value', 't_const', 'c_const_name',
        'Cena_za_dostavku');
    $Kurs_grivny_k_manatu = f_select_one('c_const_value', 't_const', 'c_const_name',
        'Kurs_grivny_k_manatu');
    $Kursa_dollora_k_grivne = f_select_one('c_const_value', 't_const',
        'c_const_name', 'Kursa_dollora_k_grivne');
    $Kurs_pw_k_grivne = f_select_one('c_const_value', 't_const', 'c_const_name',
        'Kurs_pw_k_grivne');
    if ($c_travel == 0) {
        $c_travel = $Cena_za_dostavku * $c_ves;
    }

    $sql = "INSERT INTO ".$c_alfa."t_sklad (
c_id_product, c_name_product, c_comment_product, c_netto, c_pw, c_price_ukr, 
c_price_azm_distr, c_price_azm_klient, c_date, c_ves, c_travel, c_pribil) VALUES 
('" . $c_id_product_POST . "', '" . $c_name_product . "', '" . $c_comment_product .
        "', '" . $c_netto . "', " . $c_pw . ", " . $c_price_ukr . "," . $c_price_azm_distr .
        "," . $c_price_azm_klient . ", '" . $f_today1 . "' ," . $c_ves . ", " . $c_travel .
        "," . $c_pribil . ");";
    //cho $sql;
    $result = mysql_query($sql) or die("qwCould not connect: " . mysql_error());
    $c_id_product_get = $c_id_product_POST;

    $c_message = "<h3>Товар " . $c_id_product_get . " добавлен</h3>";
}


$row_c_id_product = 0;
$row_c_name_product = 0;
$row_c_comment_product = 0;
$row_c_netto = 0;
$row_c_pw = 0;
$row_c_price_ukr = 0;
$row_c_price_azm_distr = 0;
$row_c_price_azm_klient = 0;
$row_c_ves = 0;
$row_c_travel = 0;
$row_c_pribil = 0;



?>

<body>
<table border="0">
  <tbody>
    <tr>
      <td>
        
      <form id="form1" name="form1" method="post" action="">
      
      
        <fieldset>
          <legend>
          <h3>Товар на Anbarе - Добавление</h3>
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
                    <td>Вес    обозначение</td>
                    <td><input name="c_netto" type="text" id="textfield4" value="<?php echo ($row_c_netto); ?>" /></td>
                    <td><em>пример - 500 мл</em></td>
                  </tr>
                  <tr>
                    <td>Балы</td>
                    <td><input name="c_pw" type="text" id="textfield5" value="<?php echo ($row_c_pw); ?>" /></td>
                    <td><em>пример - 4.29</em></td>
                  </tr>
                  <tr>
                    <td>Цена Укр. в    манат</td>
                    <td><input name="c_price_ukr" type="text" id="textfield6" value="<?php echo ($row_c_price_ukr); ?>"/></td>
                    <td><em>пример - 5.20</em></td>
                  </tr>
                  <tr>
                    <td>Цена    Дистрбьюторская</td>
                    <td><input name="c_price_azm_distr" type="text" id="textfield7" value="<?php echo ($row_c_price_azm_distr); ?>" /></td>
                    <td><em>пример - 9.42</em></td>
                  </tr>
                  <tr>
                    <td>Цена    Клиенсткая</td>
                    <td><input name="c_price_azm_klient" type="text" id="textfield8" value="<?php echo ($row_c_price_azm_klient); ?>" /></td>
                    <td><em>пример - 12.24</em></td>
                  </tr>
                  <tr>
                    <td>Вес в кг</td>
                    <td><input name="c_ves" type="text" id="textfield9" value="<?php echo ($row_c_ves); ?>" /></td>
                    <td><em>пример - 0.6</em></td>
                  </tr>
                  <tr>
                    <td>Цена за    доставку</td>
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
<?php echo ($c_message); ?>
</body>
</html>
