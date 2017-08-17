<?php
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');

 
include "db.php";
$data_csv=array();
$data_csv[]= array('Product Link','ASIN','DESCRIPTION','TOTAL NUMBER OF SELLERS','No. OF FBA SELLER','No. OF FBM SELLER','TOTAL NO OF REVIEWS','AVERAGE NO OF REVIEW','BUY BOX PRICE','ITEM WEIGHT');
 

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array('Product Link','ASIN','DESCRIPTION','TOTAL NUMBER OF SELLERS','No. OF FBA SELLER','No. OF FBM SELLER','TOTAL NO OF REVIEWS','AVERAGE NO OF REVIEW','BUY BOX PRICE','ITEM WEIGHT'));
 
$rows = mysql_query('SELECT url,asin,descreption,sellers,fba,fbm,review,avg_review,price,weight from results');

// loop over the rows, outputting them
while ($row = mysql_fetch_assoc($rows)) fputcsv($output, $row);




mysql_query("TRUNCATE table results");
echo "<script>window.location.herf='scrapping_data.php';</script>";
?>