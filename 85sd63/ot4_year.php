<?php
include "func_lib.php";
f_con_db('1');
f_head();
?>

<body>
<?php


@$date_1 = $_GET['date_1'];
@$date_2 = $_GET['date_2'];

if (strlen($date_1) == 0) {

 
 @$date_1 = $today[year] - 1 . '-' . $today[mon] . '-' . $today[mday];
 @$date_2 = $today[year] . '-' . $today[mon] . '-' . $today[mday];
}

?>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
 <tr bgcolor="#f87820">
<td class="tabhead"> <form id="form1" name="form1" method="get" action="">
<img src="blank.gif" width="10" height="25"> 
Отчет за период C <input  tabindex="16"  size="11" name="date_1"  value="<?php echo $date_1; ?>"/>
 По <input  tabindex="16"  size="11" name="date_2" value="<?php echo $date_2; ?>"/> 
 <input type="submit" name="Submit" value="&#1055;&#1086;&#1080;&#1089;&#1082; " />
</form>
</td>
</tr>
</table>
 <br>





<table border="0" cellpadding="0" cellspacing="0" >


 <tr bgcolor="#f87820">
 <td><img src="blank.gif" width="10" height="25"></td>
 <td class="tabhead"><img src="blank.gif" width="65" height="6"><br><b>Дата</b></td>
 <td class="tabhead"><img src="blank.gif" width="85" height="6"><br><b>Клиент</b></td>
 <td class="tabhead"><img src="blank.gif" width="55" height="6"><br><b>Код</b></td>
 <td class="tabhead"><img src="blank.gif" width="85" height="6"><br><b>Название</b></td>
 <td class="tabhead"><img src="blank.gif" width="55" height="6"><br><b>Кол-во</b></td>
 <td class="tabhead" align='right'><img src="blank.gif" width="85" height="6"><br><b>Балы</b></td>
 <td class="tabhead" align='right'><img src="blank.gif" width="85" height="6"><br><b>Цена</b></td>
 <td class="tabhead" align='right'><img src="blank.gif" width="85" height="6"><br><b>Прибыль</b></td> 

  
 </tr>


<?php



$sql = "select c_date,client_id,c_id_product,c_name_product,c_pw,c_price_azm_distr,c_pribil,c_count from ".$c_alfa."t_zakazi where c_status ='oplaceno' and ( (c_date)>('" .
 $date_1 . "')and (c_date)<('" . $date_2 . "') ) order by c_date";
$result = mysql_query($sql) or die("Could not connect: " . mysql_error());


$c_pw_sum = 0;
$c_price_azm_distr_sum = 0;
$c_pribil_sum = 0;


while ($row = mysql_fetch_assoc($result)) {

 $client_id = $row["client_id"];
 $c_date = $row["c_date"];

 $client_id_name = f_client_id_name($client_id);
 $c_id_product = $row["c_id_product"];
 $c_name_product = substr($row["c_name_product"], 0, 15) . '...';


 $c_count = $row["c_count"];


 $c_date = f_reload_date($c_date);
 $c_pw = round($c_count * $row["c_pw"], 2);
 $c_price_azm_distr = round($c_count * $row["c_price_azm_distr"], 2);
 $c_pribil = round($c_count * $row["c_pribil"], 2);


 echo "<tr><td class='tabval'></td><td class='tabval'>" . $c_date .
  "</td><td align='left' class='tabval'><a href='client_zakazi.php?client_id=" . $client_id .
  "'>" . $client_id_name . "</a></td><td class='tabval'>" . $c_id_product .
  "</td><td align='left' class='tabval'>" . $c_name_product . "</td><td align='right' class='tabval'>" . $c_count .
  "</td><td align='right' class='tabval'>" . $c_pw . "</td><td align='right' class='tabval'>" . $c_price_azm_distr .
  "</td><td align='right' class='tabval'>" . $c_pribil . "</td></tr><tr valign='bottom'><td bgcolor='#ffffff' background='strichel.gif' colspan='9'><img src='blank.gif' width='1' height='1'></td></tr>";


 $c_pw_sum = $c_pw_sum + $c_pw;
 $c_price_azm_distr_sum = $c_price_azm_distr_sum + $c_price_azm_distr;
 $c_pribil_sum = $c_pribil_sum + $c_pribil;

}

?>
<tr>
 <td colspan="6">&nbsp;</td>


 <td align='right'><? echo $c_pw_sum; ?></td>
  <td align='right'><? echo $c_price_azm_distr_sum; ?></td>
    <td align='right'><? echo $c_pribil_sum; ?></td>
   
	
 </tr>
 <tr valign="bottom"><td bgcolor="#fb7922" colspan="9"><img src="blank.gif" width="1" height="8"></td></tr>  
</table>





</body>
</html>
