<?php
include("db.php");
 include("simple_html_dom.php");
$base='https://www.amazon.com/uxcell-JSX69-370-120RPM-Turbine-Reduction/dp/B01N1JQLGF/ref=sr_1_1?ie=UTF8&qid=1487318094&sr=8-1-spons&keywords=motor&refinements=p_36%3A10000-100000&psc=1';  
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
 $html=file_get_html($base);
// print_r($html);
 $element=$html->find('div#dp');
  //  $total_no_review=$element->find('span.a-size-base',0)->plaintext;
    //print_r($element);
   // echo $total_no_review;
  
$url="https://www.amazon.com/Apple-iPhone-64GB-Unlocked-Smartphone/dp/B00YD548Q0/ref=sr_1_1?s=wireless&ie=UTF8&qid=1487326000&sr=1-1&keywords=iphone";
//$url="https://www.amazon.com/gp/offer-listing/B00YD548Q0/ref=dp_olp_new_mbc?ie=UTF8&condition=new";
echo $url; 
$html=file_get_html($url);
echo $html->find('span#acrCustomerReviewText')->plaintext;
foreach($html->find('div#dp') as $article) {
   
$auction_name= trim($article->find('span#acrCustomerReviewText')->plaintext);

        echo $auction_name;
    
 

 }   
 print_r(file_get_contents($url));
        
    ?>