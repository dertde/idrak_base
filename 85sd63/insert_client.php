<?php
include "func_lib.php";
f_con_db('1');
f_head();
?>
<body>
<p>
 <?php
$row_client_sponsor = '1';
@$POST_client_name = $_POST['client_name'];
@$POST_client_lastname = $_POST['client_lastname'];
@$POST_client_phone = $_POST['client_phone'];
@$POST_client_comment = $_POST['client_comment'];
@$POST_client_sponsor = $_POST['client_sponsor'];
@$POST_client_born_date = $_POST['client_born_date'];


if (strlen($POST_client_name) == 0) {
 $POST_client_name = 'xxx';
}
if (strlen($POST_client_lastname) == 0) {
 $POST_client_lastname = 'xxx';
}
if (strlen($POST_client_phone) == 0) {
 $POST_client_phone = 'xxx';
}
if (strlen($POST_client_comment) == 0) {
 $POST_client_comment = 'xxx';
}
if (strlen($POST_client_sponsor) == 0) {
 $POST_client_sponsor = '3';
}





if ($POST_client_name <> 'xxx') {

 $sql = "INSERT INTO ".$c_alfa."t_client ( client_name, client_lastname, client_phone, client_comment,client_sponsor,client_date,client_born_date ) VALUES ('" .
 $POST_client_name . "','" . $POST_client_lastname . "','" . $POST_client_phone .
 "','" . $POST_client_comment . "','" . $POST_client_sponsor . "','" . $kapt .
 "','" . $POST_client_born_date . "')";

 $result = mysql_query($sql) or die("insert_client.php 1: " . mysql_error());


 $STATUS_MYSQL = 'Информация добавлена';
 $sql = "insert into ".$c_alfa."t_client_pw (SELECT client_id,client_date,client_name,client_lastname,'0','0','0','0',client_sponsor " .
 "FROM ".$c_alfa."t_client where client_id = (select max(client_id) FROM ".$c_alfa."t_client ))";
 $result = mysql_query($sql) or die("insert_client.php 2: " . mysql_error());


 $STATUS_MYSQL = 'Информация добавлена' . '';


}
?>
</p>
<table width="700" border="0">
 <tr>
 <td>
 <form id="form1" name="form1" method="post" action="insert_client.php">

		



<table width="500" border="0">
  <tr>
    <td>
      <form id="form1" name="form1" method="post" action="insert_client.php">

		  <fieldset ><legend ><h3>&#1042;&#1074;&#1086;&#1076; &#1050;&#1083;&#1080;&#1077;&#1085;&#1090;&#1072;</h3></legend>



        <table cellspacing="3" cellpadding="0">

          <tr>
            <td align="left">&#1048;&#1084;&#1103;</td>
            <td></td>
            <td><input  size="40" name="client_name"/>            </td>
          </tr>
          <tr>
            <td align="left">&#1060;&#1072;&#1084;&#1080;&#1083;&#1080;&#1103;</td>
            <td></td>
            <td><input   size="40" name="client_lastname" />            </td>
          </tr>
          <tr>
           <tr>
            <td align="left">Дата рождения</td>
            <td></td>
            <td><input   size="40" name="client_born_date" value="1986-07-10" />            </td>
          </tr>
          <tr>         
            <td align="left">&#1053;&#1086;&#1084;&#1077;&#1088; &#1090;&#1077;&#1083;&#1077;&#1092;&#1086;&#1085;&#1072;</td>
            <td></td>
            <td><input name="client_phone" value="(000) 000-00-00"  size="40" />            </td>
          </tr>
          <tr>
            <td align="left">&#1044;&#1086;&#1087;&#1086;&#1083;&#1085;&#1080;&#1090;&#1077;&#1083;&#1100;&#1085;&#1072;&#1103;<br />
              &#1080;&#1085;&#1092;&#1086;&#1088;&#1084;&#1072;&#1094;&#1080;&#1103;</td>
            <td></td>
            <td><textarea name="client_comment" cols="40" rows="7" id="client_comment" tabindex="13" dir="ltr" ></textarea>            </td>
          </tr>
          <tr>
            <td align="left">&#1053;&#1086;&#1084;&#1077;&#1088; &#1089;&#1087;&#1086;&#1085;&#1089;&#1086;&#1088;&#1072; </td>
            <td></td>
            <td><input  tabindex="16"  size="11" name="client_sponsor" value="<? echo
$row_client_sponsor = $_GET['client_sponsor'];

$row_client_sponsor;
if ($row_client_sponsor) {
    $row_client_sponsor = f_get_sponsor_name($row_client_sponsor);
} ?>"/>&nbsp;&nbsp;<i><? echo
$row_client_sponsor; ?></td>
          </tr>
          <tr>
            <td colspan="3" align="left">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3" align="left"><div align="center">
                <input type="submit" name="Submit" value="&#1047;&#1072;&#1088;&#1077;&#1075;&#1080;&#1089;&#1090;&#1088;&#1080;&#1088;&#1086;&#1074;&#1072;&#1090;&#1100;" />
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
<table border=0 cellpadding="3" cellspacing="0" >
 <thead>
 <tr bgcolor="#f87820">
 <td class="tabhead" >&#8470;</th>
 <td class="tabhead" >&#1048;&#1084;&#1103; </th>
 <td class="tabhead" >&#1060;&#1072;&#1084;&#1080;&#1083;&#1080;&#1103; </th>
 <td class="tabhead" >&#1053;&#1086;&#1084;&#1077;&#1088; &#1090;&#1077;&#1083;&#1077;&#1092;&#1086;&#1085;&#1072; </th>
 <td class="tabhead">&#1044;&#1086;&#1087;&#1086;&#1083;&#1085;&#1080;&#1090;&#1077;&#1083;&#1100;&#1085;&#1072;&#1103;
&#1080;&#1085;&#1092;&#1086;&#1088;&#1084;&#1072;&#1094;&#1080;&#1103; </th>
 <td class="tabhead">&#1053;&#1086;&#1084;&#1077;&#1088; &#1089;&#1087;&#1086;&#1085;&#1089;&#1086;&#1088;&#1072; </th>
 </tr>
 </thead>
 <tbody>
 <?php
$sql = "SELECT client_id,client_name,client_lastname,client_phone,client_comment,client_sponsor FROM ".$c_alfa."t_client where client_id = (select max(client_id) FROM ".$c_alfa."t_client ) order by client_id";
$result = mysql_query($sql) or die("insert_client.php 3: " . mysql_error());

while ($row = mysql_fetch_assoc($result)) {
 $row_client_id = $row["client_id"];
 $row_client_name = $row["client_name"];
 $row_client_lastname = $row["client_lastname"];
 $row_client_phone = $row["client_phone"];
 $row_client_comment = $row["client_comment"];
 $row_client_sponsor = $row["client_sponsor"];
 $row_client_sponsor = f_get_sponsor_name($row_client_sponsor);

 if (strlen($row_client_name) == 0) {
 $row_client_name = 'xxx';
 }
 if (strlen($row_client_lastname) == 0) {
 $row_client_lastname = 'xxx';
 }
 if (strlen($row_client_phone) == 0) {
 $row_client_phone = 'xxx';
 }
 if (strlen($row_client_comment) == 0) {
 $row_client_comment = 'xxx';
 }
 if (strlen($row_client_sponsor) == 0) {
 $row_client_sponsor = '3';
 }


 echo "<tr>	<td class='tabval'><img src='blank.gif' width='30' height='6'><br>" . $row_client_id . "</td><td class='tabval'><img src='blank.gif' width='90' height='6'><br>" . $row_client_name . "</td><td class='tabval'><img src='blank.gif' width='90' height='6'><br>" .
 $row_client_lastname . "</td><td class='tabval'><img src='blank.gif' width='90' height='6'><br>" . $row_client_phone . "</td> <td class='tabval'><img src='blank.gif' width='210' height='6'><br>" . $row_client_comment .
 "</td><td class='tabval'><img src='blank.gif' width='90' height='6'><br>" . $row_client_sponsor . "</td> </tr>";
}

?>
<tr valign="bottom"><td bgcolor="#fb7922" colspan="9"><img src="blank.gif" width="1" height="8"></td></tr>
 </tbody>
</table>



</body>
</html>
