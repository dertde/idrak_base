<?php
include "func_lib.php";
f_con_db('1');
f_head();
?>

<body>
<?php

//print_r($_GET);
//print_r($_POST);

$c_id_product = $_GET['c_id_search'];
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


<table border="0" cellpadding="0" cellspacing="0" >
 <tr bgcolor="#f87820">
 <td><img src="blank.gif" width="10" height="25"></td>
  <td class="tabhead"><img src="blank.gif" width="65" height="6"><br><b>Tarix</b></td>
   <td class="tabhead"><img src="blank.gif" width="65" height="6"><br><b>Məhsulun növü </b></td>
   <td class="tabhead"><img src="blank.gif" width="85" height="6"><br><b>&nbsp;Başlıq</b></td>
     <td class="tabhead"><img src="blank.gif" width="65" height="6"><br><b>&nbsp;Idraka aid ser.nömrəsi </b></td>
 <td class="tabhead"><img src="blank.gif" width="65" height="6"><br><b>&nbsp;Seriaya nömrələri </b></td>
 <td class="tabhead"><img src="blank.gif" width="55" height="6"><br><b>Əməkdaş</b></td>

<?php
$c_comment = $_GET['c_comment'];

//if ($c_id_product) {
//    $sql = "SELECT c_id,c_vid,c_serial,c_comment,c_people_id,c_date  FROM  c_sklad order by  c_id";
//    }else{                our_
    
    $sql = "SELECT c_id,c_vid,c_serial,c_comment,c_people_id,c_date,c_our_serial   FROM c_sklad WHERE 
	c_comment LIKE '" . $c_id_product . "' or c_serial LIKE '" .$c_id_product . "' or c_our_serial LIKE '" .$c_id_product 
	. "' or c_comment LIKE '%" . $c_id_product ."' or c_serial LIKE '%" . $c_id_product ."' or c_our_serial LIKE '%" . $c_id_product 
	. "' or c_comment LIKE '" .$c_id_product . "%' or c_serial LIKE '" . $c_id_product . "%' or c_our_serial LIKE '" . $c_id_product 
	."%' or c_comment LIKE '%" . $c_id_product ."%' or c_serial LIKE '%" . $c_id_product  ."%' or c_our_serial LIKE '%" . $c_id_product 
	."%' order by c_id";
//}
   // if ($c_id_product) {$c_id_product
   // }


    $result = mysql_query($sql) or die("Could not connect: " . mysql_error());


    while ($row = mysql_fetch_assoc($result)) {

$c_id = $row["c_id"];
$c_vid = $row["c_vid"];
$c_serial = $row["c_serial"];
$c_comment = $row["c_comment"];
$c_our_serial = $row["c_our_serial"];

$c_people_id = $row["c_people_id"];
$c_people_id_txt = f_client_id_name1($c_people_id);
$c_date = $row["c_date"];
 $c_date = f_reload_date($c_date);
$c_comment = substr( $c_comment,0,25);
$c_serial = substr( $c_serial,0,25);
$c_our_serial = substr( $c_our_serial,0,25);
$c_vid  = f_get_c_vid ($c_vid );
 echo "<tr>";
	echo "<td class='tabval' ></td>";
   	echo "<td class='tabval' >" . $c_date . "</td>";
		echo "<td class='tabval' >&nbsp;" . $c_vid ."&nbsp;</td>";
	echo "<td class='tabval' >" . $c_comment . "&nbsp;</td>";
		echo "<td class='tabval' >&nbsp;" . $c_our_serial ."</td>";
	echo "<td class='tabval' >&nbsp;" . $c_serial ."&nbsp;</td>";
	



       echo "<td class='tabval' >" ."<a href='1client_zakazi_777.php?Search=" . $c_people_id ."'>&nbsp;" . $c_people_id_txt . " &nbsp;</a>" . "</td>";

       echo "<td class='tabval' >" ."<a href='1move.php?c_id=" . $c_id ."'> Move </a>" . "</td>";

	   echo "<td class='tabval' >" ."<a href='1move_history.php?c_id=" . $c_id ."'> &nbsp;İnfo </a>" . "</td>";
	   echo "<td class='tabval' >" ."<a href='1update_tovar.php?c_id_search=" . $c_id ."'> &nbsp;Edit </a>" . "</td>";

	echo "</tr>";
	echo "<tr valign='bottom'><td bgcolor='#ffffff' background='strichel.gif' colspan='10'><img src='blank.gif' width='1' height='1'></td></tr>";

   

}

?>
 <tr valign="bottom"><td bgcolor="#fb7922" colspan="10"><img src="blank.gif" width="1" height="8"></td></tr>
</table>





</body>
</html>
