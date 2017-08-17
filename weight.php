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

 //$base='https://www.amazon.com/s/ref=nb_sb_noss?url=search-alias%3D'.$category.'&field-keywords='.$sub.'&rh=n%3A2619525011%2Ck%3A'.$sub.'';
$refrence='https://www.amazon.com/BLACK-DECKER-TO1303SB-Toasting-Stainless/dp/B00FN3MV88/ref=sr_1_3?ie=UTF8&qid=1487419177&sr=8-3&keywords=oven'; 
//echo $base;

$html=file_get_contents($refrence);
    print_r($html);   
 // echo "<script>alert('hello');</script>";
 foreach($html->find('div.a-container') as $element) {
 
$abc=$element->find('table#productDetails_techSpec_section_1 tr', 1)->plaintext; 
//$weight= $element->find('div#technical-data', 0)->innertext; 
echo $abc;

 }
//echo $ratingnew;

  
 
 /* updated Results 
 print_r($data);
 echo "<br/>";
 
 
 $new_url="https://www.amazon.com/gp/offer-listing/".$data."/ref=dp_olp_all_mbc?ie=UTF8&condition=all";
 
 
 
 
 
 echo $new_url; 
$html=file_get_html($new_url);
//print_r($html);
echo "=====================================";
foreach($html->find('div.olpSellerColumn') as $article) {
   
$item['auction_name'] = trim($article->find('a', 0)->plaintext);
$auction_name= trim($article->find('a', 0)->plaintext);
 
  
$rating=trim($article->find('p', 0)->plaintext);
$exploded=explode('(',$rating);
$exploded_main=str_replace(',','',explode(')',$exploded[1]));
$int = filter_var($exploded_main[0], FILTER_SANITIZE_NUMBER_INT);
$minus=$data_show['Offers']['Offer'][$i]['SellerFeedbackRating']['FeedbackCount']+10; 
 
   echo $rating."<br/>";
        echo $auction_name;
    
 

 }
 echo "=====================================";
 
 */
 
 //End
 
 
 
 
 
 
   // echo "<script>console.log('hello')</script>";
// echo $weight;
 
        //print_r($refrence);
        //echo "<br/>";
        //fputcsv($csv_out, $csv_array);
        //$count=count($anchor->getAttribute("href"));
       // print_r($count);
        //print_r($anchor->getAttribute('href'));
           
    
    
    // $count=count($anchor->getAttribute("href"));
    

   // print_r($count);
    
    //print_r($element->getAttribute('data-asin'));
    //print_r($element->getAttribute(''))
   // print_r($element);
    //echo "<br/>";
    //echo "<br/>";
    //}
//print_r($html_base);

//$cout=count($title_mail);








 //echo $str;
 //print_r($str);



//$html_base->clear(); 
//unset($html_base);

 //echo $str
 
 
 
//echo "<script>window.location.href='scrap_data.php';</script>";
//header("location:scrap_data.php"); 
?>