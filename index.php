<?php
include "85sd63/func_lib.php";
f_con_db('1');
f_head();
?>

<body>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

<?php



//http://localhost/Felix/client_zakazi_777.php

$POST_c_user = $_POST['c_user'];
$POST_c_pass = $_POST['c_pass'];




if ($POST_c_user <> '') {


 $sql = "SELECT c_pass ,c_dir FROM t_user WHERE c_user='" . $POST_c_user . "' ";

 $result = mysql_query($sql) or die("Could not connect: " . mysql_error());

 while ($row = mysql_fetch_assoc($result)) {
 $row_c_pass = $row["c_pass"];
 $row_c_dir = $row["c_dir"];
 }
 if ($row_c_pass == $POST_c_pass) {
 echo "<p align= 'center'><a href='" . $row_c_dir . "'>Войти</a></p>";
 return;
 } else {
 $alu = '<p align="center" class="e_status_red">Пароль или Пользователь введены не верно</p> ';
 echo $alu;
 }
}
//<p align="center">Ведуться технические работы.Вход временно запрещен </p>
?>
<p align="center">Внимание если вы нашли ошибку.Сообщить о ней в вашем меню Написать об ошибке </p>

<form id="form1" name="form1" method="post" action="">
<table width="0%" border="0" align="center" cellpadding="2">
 <tr>
 <td colspan="2">&nbsp;</td>
 </tr>
 <tr>
 <td>Пользователь : </td>
 <td><input type="text" name="c_user" /></td>
 </tr>
 <tr>
 <td>Пароль :</td>
 <td><input type="password" name="c_pass" /></td>
 </tr>
 <tr>
 <td colspan="2">&nbsp;</td>
 </tr>
 <tr>
 <td colspan="2" align="center"><input type="submit" name="button" id="button" value="Войти" /></td>
 </tr>
 <tr>
 <td colspan="2">&nbsp;</td>
 </tr>
 </table>
</form>
</body>
</html>