<?php
include "func_lib.php";
f_con_db('1');
f_head();
?>


<body>
<fieldset>
<legend>Курсы</legend>

<form id="form1" name="form1" method="GET" action="">
<table width="50%" >
<?php

$GET_kurs_value = $_GET['kurs_value'];
$GET_kurs = $_GET['kurs'];
if (strlen($GET_kurs) > 0) {

    $sql = "UPDATE ".$c_alfa."t_const SET c_const_value = '" . $GET_kurs_value .
        "' WHERE ".$c_alfa."t_const.c_const_name = '" . $GET_kurs . "' ;";
    $result = mysql_query($sql) or die("Could not connect: " . mysql_error());

}


$sql = "SELECT c_const_name,c_const_value,c_const_comment FROM ".$c_alfa."t_const  ";
$result = mysql_query($sql) or die("Could not connect: " . mysql_error());

while ($row = mysql_fetch_assoc($result)) {

    $c_const_name = $row["c_const_name"];
    $c_const_value = $row["c_const_value"];
    $c_const_comment = $row["c_const_comment"];

    echo '   <tr><form id="form1" name="form1" method="get" action="">
    <td>' . $c_const_comment . '</td>
    <td>
      <input type="text" name="kurs_value"  value="' . $c_const_value . '"/>
      
    </td>
    <td><input type="hidden" name="kurs" value="' . $c_const_name .
        '" /><input type="submit" name="Update"  value="Update"/></td>
  </form></tr>
  <tr>';


}

?>


    
</table>

</fieldset>
</body>
</html>
