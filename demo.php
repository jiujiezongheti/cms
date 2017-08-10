<?php
$ch = curl_init(); 
$c_url = 'http://www.fxwin01.com'; 
$c_url_data = "product_&type=1"; 
curl_setopt($ch, CURLOPT_URL,$c_url); 
/*curl_setopt($ch, CURLOPT_POST, 1); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_POSTFIELDS, $c_url_data); */
echo $result = curl_exec($ch);
curl_close ($ch); 
unset($ch); 
?>
