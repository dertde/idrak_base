<?php
include "func_lib.php";
f_con_db('1');
f_head();
?>
<body>
<p>
 <?php


//print_r($_GET);
//print_r($_POST);


$row_client_sponsor = $_GET['Search'];
@$GET_c_vid = $_GET['c_vid'];

@$GET_c_our_serial = $_GET['c_our_serial'];
@$GET_c_serial = $_GET['c_serial'];
@$GET_c_comment = $_GET['c_comment'];
@$GET_c_people_id = $_GET['c_people_id'];

@$GET_Submit2 = $_GET['Submit2'];


$c_id_search = $_GET['c_id_search'];

if (strlen($GET_c_vid) == 0) {
 $GET_c_vid = 'xxx';
}
if (strlen($GET_c_serial) == 0) {
 $GET_c_serial = 'xxx';
}
if (strlen($GET_c_comment) == 0) {
 $GET_c_comment = 'xxx';
}
if (strlen($GET_c_people_id) == 0) {
 $GET_c_people_id = 'xxx';
}





if (strlen($GET_Submit2) <> 0) {
 


    



$sql = "UPDATE test.c_sklad SET c_vid = '". $GET_c_vid ."', c_serial = '" . $GET_c_serial . "', c_our_serial = '" .$GET_c_our_serial . "', c_comment = '" . $GET_c_comment . "' WHERE c_sklad.c_id = ".$c_id_search .";";


 $result = mysql_query($sql) or die("1insert_tovar.php 1: " . mysql_error());


 


 $STATUS_MYSQL = 'Информация добавлена' . '';


}

$c_vid=f_select_one('c_vid', 'c_sklad', 'c_id', $c_id_search);
$c_our_serial=f_select_one('c_our_serial', 'c_sklad', 'c_id', $c_id_search);
$c_serial=f_select_one('c_serial', 'c_sklad', 'c_id', $c_id_search);
$c_comment=f_select_one('c_comment', 'c_sklad', 'c_id', $c_id_search);



?>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
 <tr bgcolor="#f87820">
<td class="tabhead">
<form id="form1" name="form1" method="get" action="">
<img src="blank.gif" width="10" height="25"> Axtarış 
  <input type="text" name="c_id_search" size="15"/>
  <input type="submit" name="Submit" value="Submit" />
</form>
</td>
</tr>
</table>
<br />


</p>
<table width="700" border="0">
 <tr>
 <td>
 <form  name="form1" method="GET" action="">

		



<table width="500" border="0">
  <tr>
    <td>
      <form id="form1" name="form1" method="get" action="1insert_tovar.php">

		  <fieldset ><legend ><h3>Məhsulun daxil edilməsi</h3></legend>



        <table cellspacing="3" cellpadding="0">

          <tr>
            <td align="left">Məhsulun növü</td>
            <td></td>
            <td><select name="c_vid">
 <option value=0>--</option>
 <?php
$sql = "SELECT c_id,c_name FROM  c_vid  order by c_id ";

$result = mysql_query($sql) or die("5Could not connect: " . mysql_error());

while ($row = mysql_fetch_assoc($result)) {
 $row_c_idd = $row["c_id"];
 $row_c_named = $row["c_name"];
$alu='';
if ($row_c_idd == $c_vid) {
	$alu = 'selected="selected"';
}

 echo "<option ".$alu." value='" . $row_c_idd . "'>" . $row_c_named . "</option>";
 $ada ='';
}


?>
 
 </select>                </td>
          </tr>
          <tr>
            <td align="left">Idraka aid seriya nömrəsi</td>
            <td></td>
            <td> <textarea name="c_our_serial" id="textarea" cols="45" rows="5"><?php echo $c_our_serial;?></textarea>            </td>
          </tr>
                    <tr>         
            <td align="left">Seriaya nömrələri</td>
            <td></td>
            <td><textarea name="c_serial" id="textarea" cols="45" rows="5"><?php echo $c_serial;?> </textarea>        </td>
          </tr>
                 
          <tr>         
            <td align="left">Başlıq <br>Əlavə məlumat</td>
            <td></td>
            <td> <textarea name="c_comment" id="textarea" cols="45" rows="5"><?php echo $c_comment;?></textarea>          </td>
          </tr>
          <tr>


         
          <tr>
            <td colspan="3" align="left"><div align="center">
			<input name="c_id_search" type="hidden" value="<?php echo $c_id_search;?>" />
			 
                <input type="submit" name="Submit2" value="Düzenlemek" />
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
