<?php
ice =explode("-",str_replace('$','',$row['price']));
//$location=$row['location'];
//$mail=$row['email'];
//$car_model=$row['model'];
$category=$_REQUEST['category'];
$sub=$_REQUEST['subcategory'];

$min=$_REQUEST['minprice'];
$max=$_REQUEST['maxprice'];





                                                                //$min=$_REQUEST['min_val'];
                                                               // $max=$_REQUEST['max_val'];
if($min=="" and $max=="")
{                                                             // $cars=trim($_REQUEST['grp']);
//echo "<script> alert('hello') </script>";
$base='https://www.amazon.com/s/ref=nb_sb_noss?url=search-alias%3D'.$category.'&field-keywords='.$sub.'&rh=n%3A2619525011%2Ck%3A'.$sub.'';
}
else{
 //$base='https://www.amazon.com/s/ref=nb_sb_noss?url=search-alias%3D'.$category.'&field-keywords='.$sub.'&rh=n%3A2619525011%2Ck%3A'.$sub.'';
$base='https://www.amazon.com/s/ref=sr_nr_p_36_7?keywords='.$sub.'&low-price='.$min.'&high-price='.$max.'';   
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
    $ratingnew='0';
    $data=$element->getAttribute('data-asin');
    $dew=$element->getAttribute('data-asin');
    // foreach ($div_category as &$ul){

        $refrence=$element->find('a',0)->getAttribute("href");
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
 $Price= $element->find('span#priceblock_ourprice', 0)->innertext;
  $Merchant= $element->find('div#merchant-info', 0)->innertext;
$Descripton= $element->find('div#feature-bullets', 0)->innertext; 
$abc=$element->find('table#productDetails_techSpec_section_1 tr', 1)->plaintext; 
//$weight= $element->find('div#technical-data', 0)->innertext; 

$findme="Amazon.com";
$pos = strpos($Merchant, $findme);
if ($pos === false) {
   
 echo $Title;
  echo "<br/>"; 
  
  echo $Review;
  echo "<br/>"; 
   
 echo $Price;
 echo "<br/>"; 
 echo $Descripton;
 echo "<br/>";
  print_r($abc);
  echo "<br/>";
  echo $Merchant;
 
 echo "<br/>";
foreach($html->find('div.olpSellerColumn') as $article) {
   $ratingnew++;
$item['auction_name'] = trim($article->find('a', 0)->plaintext);
$auction_name= trim($article->find('a', 0)->plaintext);
 
  
$rating=trim($article->find('p', 0)->plaintext);
$exploded=explode('(',$rating);
$exploded_main=str_replace(',','',explode(')',$exploded[1]));
$int = filter_var($exploded_main[0], FILTER_SANITIZE_NUMBER_INT);
$minus=$data_show['Offers']['Offer'][$i]['SellerFeedbackRating']['FeedbackCount']+10; 
 
   echo $rating."<br/>";
   
        echo $auction_name;
   
   //$rcount=count($ratingnew);
 
 echo "<br/>";
 }
//echo $ratingnew;
 
 echo "<br/>";
 $fba="0";
  foreach($html->find('div.olpBadgeContainer') as $article1) {
    $fba++;
    //$item1= trim($article1->find('a', 0)->plaintext);
$auction_name1= trim($article1->find('span.a-declarative', 0)->innertext);


   //echo $rating1."<br/>";
       // echo $auction_name1;
    $acount=count($auction_name1);
    //$fbm=$rcount-$acount;
    //$fba=$acont;
    //echo $fbm;
    //echo $fba;
 

 }
echo "FBA :".$fba;
 echo "<br/>";
 
 $fbm=$ratingnew-$fba;
 echo "<br/>";
 echo "FBM :".$fbm;
  echo"<br/>";
 }
 
} 
   
 
date_default_timezone_set('America/New_York');
$area= array();
$data_line = "";
if(isset($_GET)){
  $area = $_GET['area'];
}
$count = count($area);//open the file and choose the mode
$fh = fopen("data.csv", "a");
for( $i = 0; $i <= $count; $i++){
  $data_array=array();	
  $data_array[] = date("m.d.y"); //today
  $data_array[] = $area[$i]; //area
  $data_array[] = $fba; //contractor
  //$data_array[] = $Title;  
  //$data_array[] = $_GET['project']; //project
  //$data_array[] = $_GET['town']; //town
  //$data_array[] = $_GET['street']; //street
 
  $data_line = '"'.implode('","',$data_array).'"'."\n";
  fwrite($fh, $data_line);
}
fclose($fh);
 
?>
