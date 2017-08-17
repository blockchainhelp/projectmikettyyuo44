<?php
include "db.php";
include("simple_html_dom.php");
$select="select * from results where status='0'";
$rs=mysql_query($select) or die ("Cannot Execute Query".mysql_error());
while($row=mysql_fetch_array($rs))
{

$url=$row['url'];

   $curl = curl_init($url);
 curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
 curl_setopt($curl, CURLOPT_HEADER, false);
 curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_URL, $url);
 curl_setopt($curl, CURLOPT_REFERER, $url);
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
 $str = curl_exec($curl);
 curl_close($curl);

 
 //echo "<script>console.log('hello')</script>";
 
 
 $html_base = new simple_html_dom();
$html_base->load($str); 

 foreach($html_base->find('div#dp-container') as $element) {
 $Title= $element->find('span#productTitle', 0)->plaintext;
  $Review= $element->find('i.a-icon-star', 0)->plaintext;
 
 $avr=$Review;
$customer_review=$element->find('span#acrCustomerReviewText', 0)->plaintext;
$Price= $element->find('span#priceblock_ourprice', 0)->innertext;
$Merchant= $element->find('div#merchant-info', 0)->innertext;
$Descripton= $element->find('div#feature-bullets', 0)->plaintext; 
 $total_no_review=$element->find('span#acrCustomerReviewText')->plaintext;
 $abc=$element->find('#productDetails_feature_div', 0)->innertext; 
 $weight=explode('Weight',$abc);
 $weight1=explode('Shipping',$weight[1]);
 // "weight";
$Descripton=strip_tags($Descripton);
 $gm=$weight1[0];
 $gm=strip_tags($gm);
// echo $abc;


if($Descripton=="" || $Price=="" || $Title=="" || $customer_review==""){
    $status="0";
 }else{
    $status="1";
}

if($customer_review =='')
{
    
}else
{
  $paste = "`review`='".mysql_real_escape_string($customer_review)."',";  
}

if($Merchant =='')
{
    
}else
{
  $paste1 = "`merchant`='".mysql_real_escape_string($Merchant)."',";  
}

 $update="UPDATE `results` SET `title` = '".mysql_real_escape_string($Title)."',$paste1 `descreption`='".mysql_real_escape_string($Descripton)."', $paste `weight`='".mysql_real_escape_string($gm)."',`price`='".mysql_real_escape_string($Price)."',`status`='".$status."' WHERE `id`=".$row['id'];
  mysql_query($update) or die("Cannot Execute Query".mysql_error());              
//echo $div;
}



}
 
$no=mysql_query("select * from results where status='0'");
$numbers=mysql_num_rows($no);
if($numbers>0){
    echo "<script>location.reload();</script>";
}else{
    echo"<script>window.location.href='results3.php';</script>";
}
?>




 





