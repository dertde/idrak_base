<?php
include "func_lib.php";
f_con_db('1');
f_head();
?>


<body>
<p>

<?php
//http://localhost/Felix/client_zakazi_777.php
//print_r($_GET);
//print_r($_POST);

$GET_tip = $_GET['tip'];
$GET_id_val = $_GET['id_val'];
$search_id_client_POST = $_POST['search_id_client'];
$Search_get = $_GET['Search'];
$PO_id=$Search_get;



//if (strlen($search_id_client_POST) > 0) {
//    $PO_id = $search_id_client_POST;
//}
if ($GET_tip == 'delete') {

    $sql = "DELETE FROM c_sklad WHERE c_id = " . $GET_id_val .
        " LIMIT 1;";
    $result = mysql_query($sql) or die("Could not connect: " . mysql_error());
    $PO_id=$Search_get;
}
?>

</p>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
 <tr bgcolor="#f87820">
<td class="tabhead">
<form id="form1" name="form1" method="get" action="1client_zakazi_777.php">
<img src="blank.gif" width="10" height="25"> Поиск сотрудника по ID

<input  tabindex="16"  size="11" name="Search" />
<input type="submit" name="Search1" value="Поиск " />
<?php 
if ($PO_id)
{$f_client_id_name= f_client_id_name($PO_id);
echo($f_client_id_name);}


?>

</form>
</td>
</tr>
</table>





<br />
<table border="0" bordercolor="#999999" cellpadding="0" cellspacing="0" >
<tr bgcolor="#f87820">
 <td><img src="blank.gif" width="10" height="25"></td>
 <td class="tabhead"><img src="blank.gif" width="65" height="6"><br><b>Дата</b></td>

 <td class="tabhead"><img src="blank.gif" width="85" height="6"><br><b>Название</b></td>
 <td class="tabhead" ><img src="blank.gif" width="55" height="6"><br><b>Дополнительно</b></td>


 
 </tr>
      <?php


if ($PO_id<>"") {
    //oplaceno
 //   echo '<tr>';
//    echo '<td colspan="7"><strong>Оплаченный товар:</strong></td>';
//    echo '</tr>';

    $sql = "SELECT c_id,c_serial,c_comment,c_date FROM c_sklad WHERE c_people_id = " .
        $PO_id . "  order by c_date ";
       
    $result = mysql_query($sql) or die("Could not connect1: " . mysql_error());
    $с_pw_sum = 0;
    $c_price_azm_distr_sum = 0;
    while ($row = mysql_fetch_assoc($result)) {
        $c_vid = $row["c_vid"];
         $c_id = $row["c_id"];
        $c_serial = $row["c_serial"];
        $c_comment = $row["c_comment"];
        $c_date = $row["c_date"];
       $c_date = f_reload_date($c_date);


       // echo "<tr><td></td>	<td>" . $c_date . "</td><td>" . $c_vid . "</td><td>" . $c_serial .
      //      "</td><td align='right'>" . $c_comment . "</td></tr>";
            
        	echo "<td class='tabval' ></td>";
	echo "<td class='tabval' >" . $c_date . "</td>";

	echo "<td class='tabval'>" . $c_serial . "</td>";
	echo "<td class='tabval'>" . $c_comment ."</td>";
    echo "<td class='tabval' align='right'><a href='1client_zakazi_777.php?tip=delete&id_val=" . $c_id ."&Search=".$PO_id."'> Удалить </a></td>";



	echo "</tr>";
	echo "<tr valign='bottom'><td bgcolor='#ffffff' background='strichel.gif' colspan='5'><img src='blank.gif' width='1' height='1'></td></tr>";    
            
            
    }
}

?>
 <tr valign="bottom"><td bgcolor="#fb7922" colspan="10"><img src="blank.gif" width="1" height="5"></td></tr>
        </table>
        <br />
        <br />

        <?php print ($e_status . '<br>' . $e_status1) ?>
</body>
</html>
