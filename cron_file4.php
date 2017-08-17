<?php
include "db.php";
include("simple_html_dom.php");

//$select_admin="select * from adminsetting4";
//$rs=mysql_query($select_admin) or die ("Cannot Execute Query".mysql_error());
//$row=mysql_fetch_assoc($rs);
//$price =explode("-",str_replace('$','',$row['price']));
//$location=$row['location'];
//$mail=$row['email'];
//$car_model=$row['model'];






                                                                //$min=$_REQUEST['min_val'];
                                                               // $max=$_REQUEST['max_val'];
                                                               // $cars=trim($_REQUEST['grp']);
//echo "<script> alert('hello') </script>";
$base='https://www.amazon.com/Engenius-DURAFON1X-Single-Cordless-System/dp/B0009AIJJA/ref=sr_1_16?ie=UTF8&qid=1487142319&sr=8-16&keywords=olympian+led';
 

//echo $base;

 
 
  $curl = curl_init($base);
 curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
 curl_setopt($curl, CURLOPT_HEADER, false);
 curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_URL, $base);
 curl_setopt($curl, CURLOPT_REFERER, $base);
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
 $str = curl_exec($curl);
 curl_close($curl);
 
 
 
 
 
 $html_base = new simple_html_dom();
$html_base->load($str); 
//print_r($main);
 foreach($html_base->find('div#dp-container') as $element) {
//print_r($element); 
//$today=date("d/m/Y");
//$date_1=date("d/m/Y");
//$time_1=strtotime($date_1);
//$title = $element->find('span[itemprop="name"]', 0)->innertext; 
//$title=trim(strip_tags($title));
$price= $element->find('span#priceblock_ourprice', 0)->innertext;
$descripton= $element->find('div#feature-bullets', 0)->innertext; 
$weight= $element->find('div#technical-data', 0)->innertext; 
//echo $title; 
//$test2= $element->find('div[class="a-spacing-top-small"]', 0)->innertext;

// echo $date;
 
 }


//$cout=count($title_mail);
print_r($price);
print_r($descripton);
print_r($weight);








 //echo $str;
 //print_r($str);



//$html_base->clear(); 
//unset($html_base);

 //echo $str
 
 
 
//echo "<script>window.location.href='scrap_data.php';</script>";
//header("location:scrap_data.php"); 
?>