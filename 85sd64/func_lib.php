<?php

//f_con_db	 - подключение к базе данных
//f_var_currency - определения курса валют центро банка
//f_todosmall_pic - Уменьшение размера фотографии. Нужна библиотекаа?
//f_today - возвращает текущую дату в формате 2010-09-15
//f_Cena_za_dostavku
//f_Kurs_grivny_k_manatu
//f_Kursa_dolora_k_grivne
//f_Kurs_dolora_k_manatu
//f_max_val
//f_sklad_insert - Məhsul əlavə etна Anbar



@$today = getdate();
@$kapt = $today[year] . '-' . $today[mon] . '-' . $today[mday];

function f_con_db($c_in)
{
 $conn = mysql_connect("localhost", "buzovni_idrak", "784512") or die("Could not connect: " .
 mysql_error());
 if (!mysql_select_db("buzovni_idrak")) {
 echo "Unable to select mydbname: " . mysql_error();
 exit;
 }else{
 mysql_select_db("test");
 mysql_query("SET NAMES 'utf8';",$conn);
 mysql_query("SET CHARACTER SET 'utf8';",$conn);
 mysql_query("SET SESSION collation_connection = 'utf8_general_ci';",$conn);}
}
 // $charset = mysql_client_encoding($conn);
//printf ("current character set is %s\n", $charset);
 
 
 function f_get_people($c_people_id)
{
f_con_db('1');
$sql = "SELECT c_name FROM people WHERE c_id =" . $c_people_id . " ";
$result = mysql_query($sql) or die("Could not connect: " . mysql_error());

if ($result) {
	while ($row = mysql_fetch_assoc($result)) 
		{$c_out = $row["c_name"];
}
return $c_out;
}
}

 function f_get_c_department($c_id)
{
f_con_db('1');
$sql = "SELECT c_name FROM c_department WHERE c_id =" .$c_id. " ";
$result = mysql_query($sql) or die("Could not connect: " . mysql_error());

if ($result) {
	while ($row = mysql_fetch_assoc($result)) 
		{$c_out = $row["c_name"];
}
return $c_out;
}
}

 function f_get_c_vid($c_id)
{
f_con_db('1');
$sql = "SELECT c_name FROM c_vid WHERE c_id =" .$c_id. " ";
$result = mysql_query($sql) or die("Could not connect: " . mysql_error());

if ($result) {
	while ($row = mysql_fetch_assoc($result)) 
		{$c_out = $row["c_name"];
}
return $c_out;
}
}
 

///////////////////////////////////
function f_move($c_id_product,$c_id_user)
{
 f_con_db('1');

$c_out = "Товар ".$c_id_product." перемещен клиенту ".$c_id_user;

$sql = "UPDATE c_sklad SET c_people_id = ".$c_id_user." WHERE c_id = ".$c_id_product.";";
echo ($sql );
  $result = mysql_query($sql) or die("f_move 1 : " . mysql_error());
echo ($sql );
$sql = "INSERT INTO t_move (`c_id_product`, `c_id_user`, `c_date`) VALUES (".$c_id_product.", ".$c_id_user.", NOW())";
  $result = mysql_query($sql) or die("f_move 2: " . mysql_error());


return $c_out;


 
}

//function f_get_id($c_id_product,$c_id_user)
//{
// f_con_db('1');
// $sql = "SELECT c_id_product,c_id_user FROM `t_move` WHERE `c_id_product` =" . $c_in . " ";
//  $result = mysql_query($sql) or die("Could not connect: " . mysql_error());
//
// if ($result) {
// 
// while ($row = mysql_fetch_assoc($result)) {
// $c_id_product = $row["c_id_product"];
// $c_id_user = $row["c_id_user"];
// }
//}
//
//
//function f_get_const($c_in)
//{
//$c_alfa = "nargiz_";
// f_con_db('1');
// $sql = "SELECT c_const_value FROM ".$c_alfa."t_const WHERE c_const_name='" . $c_in . "'";
// $result = mysql_query($sql) or die("Could not connect: " . mysql_error());
//
// while ($row = mysql_fetch_assoc($result)) {
// $c_out = $row["c_const_value"];
// }
//
//
// return $c_out;
//}
function f_reload_date($c_in)
{$c_alfa = "nargiz_";
 f_con_db('1');
 $c_out = substr($c_in, 8, 2) . "." . substr($c_in, 5, 2) . "." . substr($c_in, 2,
 2);

 return $c_out;
}
//
//function f_reload_pw()
//{$c_alfa = "nargiz_";
// f_con_db('1');
// 
// 
//
// $sql = "UPDATE ".$c_alfa."t_client_pw SET client_pw_m=0,client_pw_group=0, client_zpt=0, client_zpt_group=0";
// $result = mysql_query($sql) or die("f_reload_pw: " . mysql_error());
//
//
// $sql = "SELECT * FROM ".$c_alfa."t_client order by -client_id ";
// $result = mysql_query($sql) or die("f_reload_pw: " . mysql_error());
//
// while ($row = mysql_fetch_assoc($result)) {
// $row_client_id = $row["client_id"];
// $row_client_name = $row["client_name"];
// $row_client_lastname = $row["client_lastname"];
// $row_client_phone = substr($row["client_phone"], 1, 10);
// $row_client_comment = $row["client_comment"];
// $row_client_sponsor = $row["client_sponsor"];
// $row_client_sponsor = f_get_sponsor_name($row_client_sponsor);
//
// $f_t_client_pw1 = f_t_client_pw($row_client_id);
//
//
// $sql1 = "UPDATE ".$c_alfa."t_client_pw SET client_pw_m = '" . $f_t_client_pw1 .
// "' WHERE ".$c_alfa."t_client_pw.client_id = " . $row_client_id . ";";
// $result1 = mysql_query($sql1) or die("f_reload_pw: " . mysql_error());
//
// $f_group_pw1 = f_group_pw($row_client_id);
//
//
//
// $sql2 = "UPDATE ".$c_alfa."t_client_pw SET client_pw_group = '" . $f_group_pw1 .
// "' WHERE ".$c_alfa."t_client_pw.client_id = " . $row_client_id . ";";
// $result2 = mysql_query($sql2) or die("f_reload_pw: " . mysql_error());
//
//
// $c_gr_ball = $f_t_client_pw1 + $f_group_pw1;
//
//
// $cball_out = f_ball_out($c_gr_ball);
//
//
// $cball_out_grop = f_group_zap($row_client_id);
//
//
// $sql3 = "UPDATE ".$c_alfa."t_client_pw SET client_zpt_group = '" . $cball_out_grop .
// "' WHERE ".$c_alfa."t_client_pw.client_id = " . $row_client_id . ";";
// $result3 = mysql_query($sql3) or die("f_reload_pw: " . mysql_error());
//
//
// $sql3 = "UPDATE ".$c_alfa."t_client_pw SET client_zpt = '" . $cball_out .
// "' WHERE ".$c_alfa."t_client_pw.client_id = " . $row_client_id . ";";
// $result3 = mysql_query($sql3) or die("f_reload_pw: " . mysql_error());
//
// }
//
//}
//
//
//function f_t_client_pw($fc_id_client)
//{
// $c_alfa = "nargiz_";
//@$today = getdate();
//@$kapt = $today[year] . '-' . $today[mon] . '-' . $today[mday];
// f_con_db('1');
// 
// 
//
// $sql = "SELECT sum(c_pw*c_count) " . "FROM ".$c_alfa."t_zakazi " .
// "WHERE MONTH(c_date) = MONTH('" . $kapt . "') AND client_id =" . $fc_id_client .
// " and c_status='oplaceno'";
// $result = mysql_query($sql) or die("Could not connect: " . mysql_error());
//
// while ($row = mysql_fetch_assoc($result)) {
// $c_out = $row["sum(c_pw*c_count)"];
// }
//
// return $c_out;
//}
//
//function f_cl_gr_pw($fc_id_client)
//{$c_alfa = "nargiz_";
// f_con_db('1');
//
// $sql = "SELECT client_pw_group FROM ".$c_alfa."t_client_pw WHERE client_id = '" . $fc_id_client .
// "' ";
// $result = mysql_query($sql) or die("Could not connect: " . mysql_error());
//
// while ($row = mysql_fetch_assoc($result)) {
// $c_out = $row["client_pw_group"];
// }
//
// return $c_out;
//}
//
//function f_cl_gr_zpt($fc_id_client)
//{$c_alfa = "nargiz_";
// f_con_db('1');
//
// $sql = "SELECT client_zpt-client_zpt_group FROM ".$c_alfa."t_client_pw WHERE client_id = '" .
// $fc_id_client . "' ";
// $result = mysql_query($sql) or die("Could not connect: " . mysql_error());
//
// while ($row = mysql_fetch_assoc($result)) {
// $c_out = $row["client_zpt-client_zpt_group"];
// }
//
// return $c_out;
//}
//
//
//function f_group_pw($fc_id_client)
//{$c_alfa = "nargiz_";
// f_con_db('1');
// 
// 
//
// $sql = "SELECT sum(client_pw_m)+sum(client_pw_group) " . "FROM ".$c_alfa."t_client_pw " .
// "WHERE client_sponsor =" . $fc_id_client . " ";
// $result = mysql_query($sql) or die("Could not connect: " . mysql_error());
//
// while ($row = mysql_fetch_assoc($result)) {
// $c_out = $row["sum(client_pw_m)+sum(client_pw_group)"];
// }
//
// return $c_out;
//}
//
function f_select_one($f_colum, $f_tab, $f_where, $f_where_what)
{$c_alfa = "nargiz_";
 f_con_db('1');

 $sql = "SELECT ".$f_colum . " FROM " .$f_tab . " WHERE " . $f_where . " ='" .
 $f_where_what . "'";
 $result = mysql_query($sql) or die("Could not connect: " . mysql_error());

 while ($row = mysql_fetch_assoc($result)) {
 $c_out = $row[$f_colum];
 }

 return $c_out;
}


function f_client_id_name($c_in)
{$c_alfa = "nargiz_";
 f_con_db(1);
 $sql = "SELECT c_name, c_lastname FROM people where c_id=" . $c_in;
 $result = mysql_query($sql) or die("Could not connect: " . mysql_error());
 while ($row = mysql_fetch_assoc($result)) {
 $c_client_name = $row["c_name"];
 $c_client_lastname = $row["c_lastname"];
 }
 $c_out = $c_client_name . ' ' . $c_client_lastname;
 return $c_out;
}
function f_client_id_name1($c_in)
{$c_alfa = "nargiz_";
 f_con_db(1);
 $sql = "SELECT c_name, c_lastname FROM people where c_id=" . $c_in;
 $result = mysql_query($sql) or die("Could not connect: " . mysql_error());
 while ($row = mysql_fetch_assoc($result)) {
 $c_client_name = $row["c_name"];
 $c_client_lastname = $row["c_lastname"];
 }
 $c_out = $c_client_name ;
 return $c_out;
}

//
//
//function f_max_val($c_in1, $c_in2)
//{$c_alfa = "nargiz_";
// f_con_db(1);
// $sql = "SELECT max(" . $c_in1 . ") FROM " . $c_in2 . " ";
// $result = mysql_query($sql) or die("Could not connect: " . mysql_error());
// while ($row = mysql_fetch_assoc($result)) {
// $c_const_value = $row["max(" . $c_in1 . ")"];
// }
// $c_out = $c_const_value;
//
// return $c_out;
//}
//
///////////////////////////////////////
//function f_var_currency($c_in)
//{$c_alfa = "nargiz_";
// f_con_db(1);
// $sql = "SELECT * FROM ".$c_alfa."t_cur WHERE date(c_datao)='" . date("Y - m - d") . "
// '";
// $result = mysql_query($sql) or die("Could not connect: " . mysql_error());
// while ($row = mysql_fetch_assoc($result)) {
// $c_datao = substr($row["c_datao"], 0, 10);
// $c_usd = $row["c_usd"];
// $c_euro = $row["c_euro"];
// }
// if (strlen($c_datao) == 0) {
// $lines = file('http : //cbar.az/other/azn-rates');
// $c_usd = substr(strip_tags($lines[379]), 25, 6);
// $c_euro = substr(strip_tags($lines[379]), 37, 6);
// $sql = "INSERT INTO analize.t_cur (c_datao, c_usd, c_euro) VALUES (CURRENT_TIMESTAMP, '" .
// $c_usd . "', '" . $c_euro . "')";
// $result = mysql_query($sql) or die("Could not connect: " . mysql_error());
// }
// if ($c_in == 'usd') {
// $c_out = substr($c_usd, 0, 6);
// } elseif ($c_in == 'euro') {
// $c_out = substr($c_euro, 0, 6);
// } else {
// $c_out = 'SomeT-f_var_currency';
// }
// return $c_out;
//}
//
//



function f_today($c_in)
{$c_alfa = "nargiz_";
 f_con_db('1');
 
 $mday = $today["mday"];
 $mon = $today["mon"];
 if (strlen($mday) == 1) {
 $mday = '0' . $mday;
 }
 if (strlen($mon) == 1) {
 $mon = '0' . $mon;
 }
 //	 DATE(2010-09-15)
 $c_out = $today["year"] . '-' . $mon . '-' . $mday;
 return $c_out;
}

function f_head()
{

 echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd ">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Utf-8" />
<title>Felix v 2.0</title>
<link href="sample.css" rel="stylesheet" type="text/css" />
</head>';
}



?> 