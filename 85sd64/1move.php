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


@$GET_ID = $_GET['c_id'];
$c_people_id = $_GET['c_people_id'];


if ($GET_ID==""){
return;
echo ("break;");
}

$row_Submit = $_GET['Submit'];
if ($row_Submit){

$SubmitInfo= f_move($GET_ID,$c_people_id );
echo $SubmitInfo;
}

if ($GET_ID) {
    $sql = "SELECT c_id	c_vid,c_serial,c_our_serial,c_comment,c_people_id,c_date FROM `c_sklad`  WHERE c_id=" .
        $GET_ID . "";
    $result = mysql_query($sql) or die("1move.php 1: " . mysql_error());
    while ($row = mysql_fetch_assoc($result)) {
        $c_vid = $row["c_vid"];
        $c_serial = $row["c_serial"];
        $c_our_serial = $row["c_our_serial"];
        $c_comment = $row["c_comment"];
        $c_people_id = $row["c_people_id"];
        $c_date = $row["c_date"];

        $ada_c_comment = $c_comment;
        $ada_c_our_serial = $c_our_serial;
        $ada_c_people_id = $c_people_id;

    }

}


//if ($POST_c_vid <> 'xxx') {
    //$f_today1 = f_today(1);

    //$sql = "INSERT INTO c_sklad ( c_vid, c_serial, c_comment, c_people_id,c_date ) VALUES ('" .
        //$POST_c_vid . "','" . $POST_c_serial . "','" . $POST_c_comment . "','" . $POST_c_people_id .
        //"', NOW());";

    //$result = mysql_query($sql) or die("1insert_tovar.php 1: " . mysql_error());


    //$STATUS_MYSQL = 'Информация добавлена' . '';


//}

?>
</p>
<table width="800" border="0">
 <tr>
 <td>
 <form id="form1" name="form1" method="get" action="">

		



<table width="700" border="0">
  <tr>
    <td>
      <form id="form1" name="form1" method="post" action="1move.php">

		  <fieldset ><legend ><h3>Yerdəyişmə</h3></legend>



        <table cellspacing="3" cellpadding="0">
<tr>
            <td align="left">Başlıq Məhsul</td>
            <td></td><td>
			 <?php
echo "&nbsp;&nbsp;&nbsp;&nbsp;".$ada_c_comment;
?>
			</td></tr>
			<tr>
            <td align="left">Id Məhsul</td>
            <td></td><td><?php
echo "&nbsp;&nbsp;&nbsp;&nbsp;".$ada_c_our_serial;
?></td></tr>
						<tr>
            <td align="left">Köhnə sahibi</td>
            <td></td><td><?php

            $ada_c_people_id =f_get_people($ada_c_people_id);
echo "&nbsp;&nbsp;&nbsp;&nbsp;".$ada_c_people_id;


?></td></tr>
          <tr>
            <td align="left">Yeni sahibi</td>
            <td></td>
            <td><select name="c_people_id">
 <option value=0>Anbar</option>
 <?php
$sql = "SELECT c_id,c_name,c_lastname FROM  people where  c_id>0 order by c_name ";

$result = mysql_query($sql) or die("5Could not connect: " . mysql_error());

while ($row = mysql_fetch_assoc($result)) {
    $row_c_idp = $row["c_id"];
    $row_c_namep = $row["c_name"];
    $row_c_lastnamep = $row["c_lastname"];

    if ($row_c_idp == $row_client_sponsor) {
        $ada = 'selected="selected"';
    }

    echo "<option " . $ada . "  value='" . $row_c_idp . "'>" . $row_c_namep . " " .
        $row_c_lastnamep . "</option>";
    $ada = '';
}


?>
 
 </select>           </td>
          </tr>
          
          
         
          <tr>
            <td colspan="3" align="left"><div align="center">
<input name="c_id" type="hidden" value="<?php echo $GET_ID ;?>" />
                <input type="submit" name="Submit" value="Переместить" />
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
