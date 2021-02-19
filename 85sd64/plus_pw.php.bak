<?php
include "func_lib.php";
f_con_db('1');
f_head();
?>

<body>
<?php

$row_client_sponsor = $_GET['client_id'];
$GET_client_id = $_GET['client_id'];
$GET_c_pw = $_GET['c_pw'];





if ($GET_c_pw > 0) {

    $sql = "INSERT INTO ".$c_alfa."t_zakazi (c_id_val, c_id_product, c_name_product, c_comment_product, c_netto, c_pw, c_price_ukr, c_price_azm_distr, c_price_azm_klient, c_date, c_ves, c_travel, c_pribil, c_count, client_id, c_status) VALUES (NULL, '999999', 'Добавление баллов', 'Добавление баллов', '', '" .
        $GET_c_pw . "', '0', '0', '0', '2010-12-31', '0', '0', '0', '1', '" . $GET_client_id .
        "', 'oplaceno');";
    $result = mysql_query($sql) or die("4Could not connect: " . mysql_error());
    echo 'Баллы Добавлены ' . $GET_c_pw;
}

?>
      <fieldset>
     
        
<form id="form1" name="form1" method="GET" action="">
  Клиент <input type="text" name="client_id"  value="<?php echo $row_client_sponsor ?>" size="3"/>
  <?php $row_client_sponsor = f_get_sponsor_name($row_client_sponsor);
echo $row_client_sponsor; ?>
   Баллы <input name="c_pw" type="text"   />
  <input type="submit" name="Submit" value="Добавить" />
</form>
</fieldset>

</body>
</html>
