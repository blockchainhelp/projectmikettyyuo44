<?php
include("db.php");
 
error_reporting(0);
// create a file pointer connected to the output stream
 
$data_csv=array();
// output the column headings
$data_csv[]= array('Product Link','ASIN','DESCRIPTION','TOTAL NUMBER OF SELLERS','No. OF FBA SELLER','No. OF FBM SELLER','TOTAL NO OF REVIEWS','AVERAGE NO OF REVIEW','BUY BOX PRICE','ITEM WEIGHT');
include("simple_html_dom.php");

//$select_admin="select * from adminsetting4";
//$rs=mysql_query($select_admin) or die ("Cannot Execute Query".mysql_error());
//$row=mysql_fetch_assoc($rs);
//$price =explode("-",str_replace('$','',$row['price']));
//$location=$row['location'];
//$mail=$row['email'];
//$car_model=$row['model'];
$category=$_REQUEST['category'];
$sub=$_REQUEST['subcategory'];

$min=$_REQUEST['minprice'];
$max=$_REQUEST['maxprice'];



$Review=$_REQUEST['reviews'];

                                                                //$min=$_REQUEST['min_val'];
                                                               // $max=$_REQUEST['max_val'];
if($min=="" and $max=="")
{ 
     if($Review=='4'){
        $base="https://www.amazon.com/s/ref=sr_nr_p_72_0?fst=as%3Aoff&rh=n%3A2619525011%2Ck%3A".$sub."%2Cp_72%3A2661618011&keywords=".$sub."&ie=UTF8&qid=1487254558&rnid=2661617011";
    }elseif($Review=='3'){
        $base="https://www.amazon.com/gp/search/ref=sr_nr_p_72_1?fst=as%3Aoff&rh=n%3A2619525011%2Ck%3A".$sub."%2Cp_72%3A2661619011&keywords=".$sub."&ie=UTF8&qid=1487254589&rnid=2661617011";
    }elseif($Review=='2'){
        $base="https://www.amazon.com/s/ref=sr_nr_p_72_2?fst=as%3Aoff&rh=n%3A2619525011%2Ck%3A".$sub."%2Cp_72%3A2661620011&keywords=".$sub."&ie=UTF8&qid=1487254648&rnid=2661617011";
    }elseif($Review=='1'){
        $base="https://www.amazon.com/s/ref=sr_nr_p_72_3?fst=as%3Aoff&rh=n%3A2619525011%2Ck%3A".$sub."%2Cp_72%3A2661621011&keywords=".$sub."&ie=UTF8&qid=1487254682&rnid=2661617011";
    }else{// $cars=trim($_REQUEST['grp']);
//echo "<script> alert('hello') </script>";
$base='https://www.amazon.com/s/ref=nb_sb_noss?url=search-alias%3D'.$category.'&field-keywords='.$sub.'&rh=n%3A2619525011%2Ck%3A'.$sub.'';
}
}
else{
    if($Review=='4'){
        $base="https://www.amazon.com/s/ref=sr_nr_p_72_0?fst=as%3Aoff&rh=n%3A2619525011%2Ck%3A".$sub."%2Cp_72%3A2661618011&keywords=".$sub."&ie=UTF8&qid=1487254558&rnid=2661617011&low-price=".$min."&high-price=".$max;
    }elseif($Review=='3'){
        $base="https://www.amazon.com/gp/search/ref=sr_nr_p_72_1?fst=as%3Aoff&rh=n%3A2619525011%2Ck%3A".$sub."%2Cp_72%3A2661619011&keywords=".$sub."&ie=UTF8&qid=1487254589&rnid=2661617011&low-price=".$min."&high-price=".$max;
    }elseif($Review=='2'){
        $base="https://www.amazon.com/s/ref=sr_nr_p_72_2?fst=as%3Aoff&rh=n%3A2619525011%2Ck%3A".$sub."%2Cp_72%3A2661620011&keywords=".$sub."&ie=UTF8&qid=1487254648&rnid=2661617011&low-price=".$min."&high-price=".$max;
    }elseif($Review=='1'){
        $base="https://www.amazon.com/s/ref=sr_nr_p_72_3?fst=as%3Aoff&rh=n%3A2619525011%2Ck%3A".$sub."%2Cp_72%3A2661621011&keywords=".$sub."&ie=UTF8&qid=1487254682&rnid=2661617011&low-price=".$min."&high-price=".$max;
    }else{
 //$base='https://www.amazon.com/s/ref=nb_sb_noss?url=search-alias%3D'.$category.'&field-keywords='.$sub.'&rh=n%3A2619525011%2Ck%3A'.$sub.'';
$base='https://www.amazon.com/s/ref=sr_nr_p_36_7?keywords='.$sub.'&low-price='.$min.'&high-price='.$max.'';  
} 
}
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
 
foreach($html_base->find('li.s-result-item') as $element) {
   // print_r($element);
   $run_data='1';
    $ratingnew='0';
    $data=$element->getAttribute('data-asin');
    $dew=$element->getAttribute('data-asin');
  //  $total_no_review=$element->find('a.a-link-normal')->plaintext;
    // foreach ($div_category as &$ul){
echo $total_no_review;
        $refrence=$element->find('a',0)->getAttribute("href");
        $product_url=$refrence;
         $new_urls="https://www.amazon.com/gp/offer-listing/".$dew."/ref=dp_olp_all_mbc?ie=UTF8&condition=all";
 //echo $new_urls; 
$html=file_get_html($new_urls);
//print_r($html);
//echo "=====================================";


         $curl = curl_init($refrence);
 curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
 curl_setopt($curl, CURLOPT_HEADER, false);
 curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_URL, $refrence);
 curl_setopt($curl, CURLOPT_REFERER, $refrence);
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
 $str = curl_exec($curl);
 curl_close($curl);

 
 //echo "<script>console.log('hello')</script>";
 
 
 $html_base = new simple_html_dom();
$html_base->load($str); 
 // echo "<script>alert('hello');</script>";
 foreach($html_base->find('div.a-container') as $element) {
 $Title= $element->find('span#productTitle', 0)->innertext;
 $Review= $element->find('i.a-icon-star', 0)->innertext;
 
 $avr=$Review;
 
 $customer_review=$element->find('span#acrCustomerReviewText', 0)->innertext;
 $Price= $element->find('span#priceblock_ourprice', 0)->innertext;
  $Merchant= $element->find('div#merchant-info', 0)->innertext;
$Descripton= $element->find('div#feature-bullets', 0)->innertext; 
$total_no_review=$element->find('span#acrCustomerReviewText')->plaintext;
$abc=$element->find('table#productDetails_techSpec_section_1 tr', 1)->plaintext; 
//$weight= $element->find('div#technical-data', 0)->innertext; 
//echo $total_no_review."========================";
$findme="Amazon.com";
$pos = strpos($Merchant, $findme);
if ($pos === false) {
   
// echo $Title;
//  echo "<br/>"; 
  
//  echo $Review;
//  echo "<br/>"; 
   
// echo $Price;
// echo "<br/>"; 
// echo $Descripton;
// echo "<br/>";
//  print_r($abc);
//  echo "<br/>";
 // echo $Merchant;
 
 //echo "<br/>";
foreach($html->find('div.olpSellerColumn') as $article) {
   $ratingnew++;
$item['auction_name'] = trim($article->find('a', 0)->plaintext);
$auction_name= trim($article->find('a', 0)->plaintext);
 
  
$rating=trim($article->find('p', 0)->plaintext);
$exploded=explode('(',$rating);
$exploded_main=str_replace(',','',explode(')',$exploded[1]));
$int = filter_var($exploded_main[0], FILTER_SANITIZE_NUMBER_INT);
$minus=$data_show['Offers']['Offer'][$i]['SellerFeedbackRating']['FeedbackCount']+10; 
 
 //  echo $rating."<br/>";
   
  //      echo $auction_name;
   
   //$rcount=count($ratingnew);
 
// echo "<br/>";
 }
//echo $ratingnew;
 
 //echo "<br/>";
 $fba="0";
  foreach($html->find('div.olpBadgeContainer') as $article1) {
    $fba++;
    //$item1= trim($article1->find('a', 0)->plaintext);
$auction_name1= trim($article1->find('span.a-declarative', 0)->innertext);

         $data[] = array();
  
   //echo $rating1."<br/>";
       // echo $auction_name1;
    $acount=count($auction_name1);
    //$fbm=$rcount-$acount;
    //$fba=$acont;
    //echo $fbm;
    //echo $fba;
 

 }
 if($Title!=""){
//echo "FBA :".$fba;
// echo "<br/>";
 
 $fbm=$ratingnew-$fba;
 //echo "<br/>";
 //echo "FBM :".$fbm;
 // echo"<br/>";
  }
  $data_csv[]= array($product_url,$dew,$Descripton,$ratingnew,$fba,$fbm,$total_no_review,$Review,$Price,$abc);
 }
 
} 
  
 
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
    
    }
    
    
 //print_R($data_csv);
 
   
 
outputCSV($data_csv);

function outputCSV($data_csv) {
    $output = fopen("data_amazon.csv", "w");
    foreach ($data_csv as $row) {
        fputcsv($output, $row);
    }
    fclose($output);
}
?>

 
<?php

if($run_data){

?>

 <iframe src='data_amazon.csv' style="display:none"></iframe>


<script type="text/javascript"> 
     setTimeout(function(){window.top.location.href='scrapping_data.php';},1000); 
</script>
   
<?php 
  }
  else{
    
    ?>
    
    
    <?php
 // echo "<script>window.location.href=window.location.href;</script>";  
 }
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