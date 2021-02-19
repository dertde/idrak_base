<?php
include "func_lib.php";
f_con_db('1');
f_head();
?>

<body>


<table border="0" cellpadding="0" cellspacing="0" >

 <tr bgcolor="#f87820">
 <td><img src="blank.gif" width="10" height="25"></td>
 <td class="tabhead"><img src="blank.gif" width="65" height="6"><br><b>Код</b></td>
 <td class="tabhead"><img src="blank.gif" width="85" height="6"><br><b>Başlıq</b></td>
 <td class="tabhead" align='right'><img src="blank.gif" width="55" height="6"><br><b>Кол-во</b></td>
 <td class="tabhead" align='right'><img src="blank.gif" width="85" height="6"><br><b>Вес</b></td>
 <td class="tabhead" align='right'><img src="blank.gif" width="55" height="6"><br><b>Балы</b></td>
 <td class="tabhead" align='right'><img src="blank.gif" width="85" height="6"><br><b>Ц.Укр.</b></td>
 <td class="tabhead" align='right'><img src="blank.gif" width="85" height="6"><br><b>Ц.Дистрб.</b></td>
 <td class="tabhead" align='right'><img src="blank.gif" width="85" height="6"><br><b>Доставка</b></td> 
<td class="tabhead" align='right'><img src="blank.gif" width="85" height="6"><br><b>Прибыль</b></td> 
 
 </tr>

<?php
$sql = "SELECT 
c_id_product,c_name_product,c_ves,c_pw,c_price_ukr,c_price_azm_distr,c_travel,c_pribil,c_count FROM ".$c_alfa."t_sk_in where c_count<4 ";
$result = mysql_query($sql) or die("Could not connect: " . mysql_error());


$c_ves_sum = 0;
$c_pw_sum = 0;
$c_price_ukr_sum = 0;
$c_price_azm_distr_sum = 0;
$c_travel_sum = 0;
$c_pribil_sum = 0;
$c_count_sum = 0;

while ($row = mysql_fetch_assoc($result)) {

 $c_id_product = $row["c_id_product"];
 $c_name_product = substr($row["c_name_product"], 0, 30) . '...';

 $c_count = $row["c_count"];

 $c_ves = $c_count * $row["c_ves"];
 $c_pw = $c_count * $row["c_pw"];
 $c_price_ukr = $c_count * $row["c_price_ukr"];
 $c_price_azm_distr = $c_count * $row["c_price_azm_distr"];
 $c_travel = $c_count * $row["c_travel"];
 $c_pribil = $c_count * $row["c_pribil"];



 // echo "<tr><td>" . $c_id_product . "</td><td>" . $c_name_product .
 // "</td><td align='right'>" . $c_count . "</td><td align='right'>" . $c_ves .
 // "</td><td align='right'>" . $c_pw . "</td><td align='right'>" . $c_price_ukr .
 // "</td><td align='right'>" . $c_price_azm_distr . "</td><td align='right'>" . $c_travel .
 // "</td><td align='right'>" . $c_pribil . "</td></tr>";



 echo "<tr>";
	echo "<td class='tabval' ></td>";
	echo "<td class='tabval' >" . $c_id_product . "</td>";
	echo "<td class='tabval' >" . $c_name_product ."</td>";
	echo "<td class='tabval' align='right'>" . $c_count . "</td>";
	echo "<td class='tabval' align='right'>" . $c_ves ."</td>";
	echo "<td class='tabval' align='right'>" . $c_pw . "</td>";
	echo "<td class='tabval' align='right'>" . $c_price_ukr ."</td>";
	echo "<td class='tabval' align='right'>" . $c_price_azm_distr . "</td>";
	echo "<td class='tabval' align='right'>" . $c_travel ."</td>";
	echo "<td class='tabval' align='right'>" . $c_pribil . "</td>";
	echo "</tr>";
	echo "<tr valign='bottom'><td bgcolor='#ffffff' background='strichel.gif' colspan='10'><img src='blank.gif' width='1' height='1'></td></tr>";



 $c_ves_sum = $c_ves_sum + $c_ves;
 $c_pw_sum = $c_pw_sum + $c_pw;
 $c_price_ukr_sum = $c_price_ukr_sum + $c_price_ukr;
 $c_price_azm_distr_sum = $c_price_azm_distr_sum + $c_price_azm_distr;
 $c_travel_sum = $c_travel_sum + $c_travel;
 $c_pribil_sum = $c_pribil_sum + $c_pribil;

}

?>
<tr>
 <td colspan="3">&nbsp;</td>

 <td align='right'><? echo $c_ves_sum; ?></td>
 <td align='right'><? echo $c_pw_sum; ?></td>
 <td align='right'><? echo $c_price_ukr_sum; ?></td>
 <td align='right'><? echo $c_price_azm_distr_sum; ?></td>
 <td align='right'><? echo $c_travel_sum; ?></td>
 <td align='right'><? echo $c_pribil_sum; ?></td>
 
	
 </tr>
 <tr valign="bottom"><td bgcolor="#fb7922" colspan="10"><img src="blank.gif" width="1" height="8"></td></tr>
</table>

<?php echo $c_out . "<br>"; ?>



<p>&nbsp;</p>
</body>
</html>
