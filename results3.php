<?php
include "db.php";
include("simple_html_dom.php");
$select="select * from results where status='1'";
$rs=mysql_query($select) or die ("Cannot Execute Query".mysql_error());
while($row=mysql_fetch_array($rs))
{
 $status="0";   
$url=$row['asin'];
$Merchant=$row['merchant'];
$fba="0"; 
$ratingnew='0';
 $new_urls="https://www.amazon.com/gp/offer-listing/".$url."/ref=dp_olp_all_mbc?ie=UTF8&condition=all";
 $html=file_get_html($new_urls);
  $findme="Amazon.com";
$pos = strpos($Merchant, $findme);
if ($pos === false){
 foreach($html->find('div.olpSellerColumn') as $article) {
   $ratingnew++;
$item['auction_name'] = trim($article->find('a', 0)->plaintext);
$auction_name= trim($article->find('a', 0)->plaintext);
 

    
 $rating=trim($article->find('p', 0)->plaintext);
$exploded=explode('(',$rating);
$exploded_main=str_replace(',','',explode(')',$exploded[1]));
$int = filter_var($exploded_main[0], FILTER_SANITIZE_NUMBER_INT);
$minus=$data_show['Offers']['Offer'][$i]['SellerFeedbackRating']['FeedbackCount']+10; 
}

  foreach($html->find('div.olpBadgeContainer') as $article1) {
    $fba++;
    $item1= trim($article1->find('a', 0)->plaintext);
$auction_name1= trim($article1->find('span.a-declarative', 0)->innertext);
 }
 if($fbm="0" and $fba="0")
 {
    echo "<script>location.reload();</script>";
 }
 else{

$fbm=$ratingnew-$fba;
 $status="1";
 $update="UPDATE `results` SET `fbm` = '".mysql_real_escape_string($fbm)."',`fba`='".mysql_real_escape_string($fba)."',`sellers`='".mysql_real_escape_string($ratingnew)."',`status`='".$status."' WHERE `id`=".$row['id'];
  mysql_query($update) or die("Cannot Execute Query".mysql_error()); 
  
  echo "<script>window.location.href='results4.php';</script>" ;
  
  }
  

  }
}
?>