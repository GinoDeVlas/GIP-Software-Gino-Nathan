<?php
session_start();
$result=$_SESSION['2fa_str'];
echo $result;
$cURLConnection = curl_init("https://www.authenticatorapi.com/pair.aspx?AppName=GAC&AppInfo=Onlinebanking&SecretCode=$result");//Setting Options for the cURL Request
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);//Execute the Request
$apiResponse = curl_exec($cURLConnection);//Close
curl_close($cURLConnection);//Displaying the QR Code
echo $apiResponse;
?>
