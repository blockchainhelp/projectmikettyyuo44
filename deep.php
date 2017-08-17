<?php

include "db.php";
include("simple_html_dom.php");

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






function scraping_digg($base){  
   echo  $base;
   $html = file_get_html($base);    
    // print_r($html);
    foreach($html->find('ul.s-result-list') as $element) {
  print_r($element);
    $ratingnew='0';
    $data=$element->getAttribute('data-asin');
    $dew=$element->getAttribute('data-asin');
    // foreach ($div_category as &$ul){

        $refrence=$element->find('a',0)->getAttribute("href");
       echo   $new_urls="https://www.amazon.com/gp/offer-listing/".$dew."/ref=dp_olp_all_mbc?ie=UTF8&condition=all";
    
    
    
    // clean up memory
    $html->clear();
    unset($html); 
  //print_r($ret);
    return $ret;    
   }
   }
   
  $check= scraping_digg($base);
?>