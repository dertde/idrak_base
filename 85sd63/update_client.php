<?php
include "func_lib.php";
f_con_db('1');
f_head();
?>


<body>
  <?php


//print_r($_POST);

//print_r($_GET);


$Update_POST = $_POST['Update'];
if ($Update_POST) {

    $POST_update_client_id = $_POST['update_client_id'];
    $POST_update_client_name = $_POST['update_client_name'];
    $POST_update_client_lastname = $_POST['update_client_lastname'];
    $POST_update_client_phone = $_POST['update_client_phone'];
    $POST_update_client_comment = $_POST['update_client_comment'];
    $POST_update_client_sponsor = $_POST['update_client_sponsor'];
    $POST_update_client_born_date = $_POST['update_client_born_date'];
    

    $today = getdate();
$kapt = $today[year] . '-' . $today[mon] . '-' . $today[mday];

    $sql = "UPDATE ".$c_alfa."t_client SET client_date = '" . $kapt .
        "', client_name = '" . $POST_update_client_name . 
        "', client_lastname = '" . $POST_update_client_lastname .
        "', client_phone = '" . $POST_update_client_phone . 
        "', client_comment = '" . $POST_update_client_comment .
        "', client_sponsor = '" . $POST_update_client_sponsor .
        "', client_born_date = '" . $POST_update_client_born_date.
        "' WHERE ".$c_alfa."t_client.client_id = '" . $POST_update_client_id . "' LIMIT 1;";
    $e_status = '<p class="e_status">  Клиент ' . $POST_update_client_id .
        ' изменен </p>';

    $result = mysql_query($sql) or die("Could not connect: " . mysql_error());

}


$delete = $_POST['delete'];

if ($delete) {
    $POST_update_client_id = $_POST['update_client_id'];
    $sql = "DELETE FROM ".$c_alfa."t_client WHERE ".$c_alfa."t_client.client_id = " . $POST_update_client_id .
        " LIMIT 1;";
    $result = mysql_query($sql) or die("Could not connect: " . mysql_error());

    $sql = "DELETE FROM ".$c_alfa."t_client_pw WHERE ".$c_alfa."t_client_pw.client_id = " . $POST_update_client_id .
        " LIMIT 1;";
    $result = mysql_query($sql) or die("Could not connect: " . mysql_error());
    $e_status = '<p class="e_status">  Клиент ' . $POST_update_client_id .
        ' удален </p>';
}




$search_id_client_POST = $_GET['Search'];
$Search_POST = $_POST['Search'];


if (strlen($POST_update_client_id) > 0) {
    $search_id_client_POST = $POST_update_client_id;
} else {
    $search_id_client_POST = $_GET['Search'];
}

if (($search_id_client_POST)) {


    $sql = "SELECT * FROM ".$c_alfa."t_client WHERE client_id = " . $search_id_client_POST .
        " order by client_id LIMIT 0, 30 ";
    $result = mysql_query($sql) or die("Could not connect: " . mysql_error());

    if ($result) {
        $e_status1 = '<p class="e_status_blue">  Клиент ' . $search_id_client_POST .
            ' не найден </p>';
    }
    while ($row = mysql_fetch_assoc($result)) {
        $row_client_id = $row["client_id"];
        $row_client_name = $row["client_name"];
        $row_client_lastname = $row["client_lastname"];
        $row_client_phone = $row["client_phone"];
        $row_client_comment = $row["client_comment"];
        $row_client_sponsor = $row["client_sponsor"];
        $row_client_born_date = $row["client_born_date"];
        
    }
} else {
    $row_client_sponsor = $_GET['client_sponsor'];

}


?>
</p>



<table border="0" cellpadding="0" cellspacing="0" width="100%">
 <tr bgcolor="#f87820">
<td class="tabhead">
<form id="form1" name="form1" method="get" action="update_client.php">
<img src="blank.gif" width="10" height="25"> Поиск Дистрбьютора по ID

<input  tabindex="16"  size="11" name="Search" />
<input type="submit" name="Search1" value="Поиск " />
</form>
</td>
</tr>
</table>




<br />
<table width="500" border="0">
  <tr>
    <td>
      <form id="form1" name="form1" method="post" action="update_client.php">

		  <fieldset  ><legend >
		  <h3>&#1056;&#1077;&#1076;&#1072;&#1082;&#1090;&#1080;&#1088;&#1086;&#1074;&#1072;&#1085;&#1080;&#1077; &#1050;&#1083;&#1080;&#1077;&#1085;&#1090;&#1072;</h3>
		  </legend>



        <table cellspacing="3" cellpadding="0">
          <tr >
            <td align="left">&#1053;&#1086;&#1084;&#1077;&#1088; &#1050;&#1083;&#1080;&#1077;&#1085;&#1090;&#1072;</td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td><input   size="10" name="update_client_id" value="<? echo $row_client_id; ?>"/></td>
          </tr>
          <tr>
            <td align="left">&#1048;&#1084;&#1103;</td>
            <td></td>
            <td><input  size="40" name="update_client_name" value="<? echo $row_client_name; ?>"/>            </td>
          </tr>
          <tr>
            <td align="left">&#1060;&#1072;&#1084;&#1080;&#1083;&#1080;&#1103;</td>
            <td></td>
            <td><input   size="40" name="update_client_lastname" value="<? echo
$row_client_lastname; ?>" />            </td>
          </tr>
                     <tr>
            <td align="left">Дата рождения</td>
            <td></td>
            <td><input   size="40" name="update_client_born_date" value="<? echo
$row_client_born_date; ?> " />            </td>
          </tr>
          <tr>   
          <tr>
            <td align="left">&#1053;&#1086;&#1084;&#1077;&#1088; &#1090;&#1077;&#1083;&#1077;&#1092;&#1086;&#1085;&#1072;</td>
            <td></td>
            <td><input name="update_client_phone"  value="<? echo $row_client_phone; ?>"  size="40" />            </td>
          </tr>
          <tr>
            <td align="left">&#1044;&#1086;&#1087;&#1086;&#1083;&#1085;&#1080;&#1090;&#1077;&#1083;&#1100;&#1085;&#1072;&#1103;<br />
              &#1080;&#1085;&#1092;&#1086;&#1088;&#1084;&#1072;&#1094;&#1080;&#1103;</td>
            <td></td>
            <td><textarea name="update_client_comment" cols="40" rows="7" id="update_client_comment" tabindex="13" dir="ltr" ><? echo
$row_client_comment; ?></textarea>            </td>
          </tr>
          <tr>
            <td align="left">&#1053;&#1086;&#1084;&#1077;&#1088; &#1089;&#1087;&#1086;&#1085;&#1089;&#1086;&#1088;&#1072; </td>
            <td></td>
            <td><input  tabindex="16"  size="11" name="update_client_sponsor" value="<? echo
$row_client_sponsor;
if ($row_client_sponsor) {
    $row_client_sponsor = f_get_sponsor_name($row_client_sponsor);
} ?>"/>&nbsp;&nbsp;<i><? echo
$row_client_sponsor; ?></i></td>
          </tr>
          <tr>
            <td colspan="3" align="left">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3" align="left"><div align="center">
                <input type="submit" name="Update" value="Обновить" />
            <input type="submit" name="delete" value="Удалить " /></div></td>
          </tr>
        </table>
		</fieldset>
    </form></td>
  </tr>
</table>
<?php print ($e_status . '<br>' ) ?>

</body>
</html>
