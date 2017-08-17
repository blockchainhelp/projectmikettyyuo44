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
error_reporting(0);
// create a file pointer connected to the output stream
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
//   print_r($element);
    $ratingnew='0';
    $data=$element->getAttribute('data-asin');
    $dew=$element->getAttribute('data-asin');
    // foreach ($div_category as &$ul){
        $refrence=$element->find('a',0)->getAttribute("href");
       // echo $refrence;
        //echo "<br/>";
        $avr=$element->find('a.a-popover-trigger',0)->plaintext;
        //$totalreviews=$element->find('a.a-link-normal',0)->plaintext;
        //echo $avr;
        //echo "<br/>";
      //  echo $totalreviews;
         //echo "<br/>";    
       $insert="INSERT INTO results (url,asin,avg_review) VALUES ('".mysql_real_escape_string($refrence)."','".mysql_real_escape_string($dew)."','".mysql_real_escape_string($avr)."')"; 
 $query= mysql_query($insert) or die("Cannot Execute query".mysql_error());  
  if($query){
    $match_data="0";
  }else{
    $match_data="1";
  }

 }
 
 if($match_data=="0"){
    echo "<script>window.location.href='results2.php';</script>" ;
   }else{
        echo "<script>location.reload();</script>";
        //echo "not working..."; 
       }
  ?>
  
  <script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
</script>