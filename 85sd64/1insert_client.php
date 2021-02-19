<?php
include "func_lib.php";
f_con_db('1');
f_head();
?>
<body>
<p>
 <?php
$row_client_sponsor = '1';
@$POST_c_name = $_POST['c_name'];
@$POST_c_lastname = $_POST['c_lastname'];
@$POST_c_phone = $_POST['c_phone'];
@$POST_c_department = $_POST['c_department'];



if (strlen($POST_c_name) == 0) {
 $POST_c_name = 'xxx';
}
if (strlen($POST_c_lastname) == 0) {
 $POST_c_lastname = 'xxx';
}
if (strlen($POST_c_phone) == 0) {
 $POST_c_phone = 'xxx';
}
if (strlen($POST_c_department) == 0) {
 $POST_c_department = 'xxx';
}






if ($POST_c_name <> 'xxx') {

 $sql = "INSERT INTO people ( c_name, c_lastname, c_phone, c_department,c_date ) VALUES ('" .
 $POST_c_name . "','" . $POST_c_lastname . "','" . $POST_c_phone .
 "','" . $POST_c_department . "', NOW());";

 $result = mysql_query($sql) or die("1insert_client.php 1: " . mysql_error());


 


 $STATUS_MYSQL = 'Информация добавлена' . '';


}
?>
</p>
<table width="700" border="0">
 <tr>
 <td>
 <form id="form1" name="form1" method="post" action="1insert_client.php">

		



<table width="500" border="0">
  <tr>
    <td>
      <form id="form1" name="form1" method="post" action="1insert_client.php">

		  <fieldset ><legend ><h3>Işçinin əlavə edilməsi</h3></legend>



        <table cellspacing="3" cellpadding="0">

          <tr>
            <td align="left">Ad</td>
            <td></td>
            <td><input  size="40" name="c_name"/>            </td>
          </tr>
          <tr>
            <td align="left">Soyad</td>
            <td></td>
            <td><input   size="40" name="c_lastname" />            </td>
          </tr>
          <tr>
           <tr>
            <td align="left">Şöbə</td>
            <td></td>
            <td><select name="c_department">
 <option value=0>--</option>
 <?php
$sql = "SELECT c_id,c_name FROM  c_department  order by c_id ";

$result = mysql_query($sql) or die("5Could not connect: " . mysql_error());

while ($row = mysql_fetch_assoc($result)) {
 $row_c_idd = $row["c_id"];
 $row_c_named = $row["c_name"];



 echo "<option value='" . $row_c_idd . "'>" . $row_c_named . "</option>";
}


?>
 
 </select>          </td>
          </tr>
          <tr>         
            <td align="left">Telefon nömrəsi</td>
            <td></td>
            <td><input name="c_phone" value="(000) 000-00-00"  size="40" />            </td>
          </tr>
         
          <tr>
            <td colspan="3" align="left"><div align="center">
                <input type="submit" name="Submit" value="Qeydiyyata sal" />
            </div></td>
          </tr>
        </table>
		</fieldset>
    </form></td>
  </tr>
</table>
		
 </form></td>
 </tr>
</table>
<br>
<br>
<?php echo $STATUS_MYSQL; ?>



</body>
</html>
