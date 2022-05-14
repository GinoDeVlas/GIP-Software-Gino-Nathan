<?php
//A random Code for the request to the API
$random_code = rand(1000,9999);
//Random Code can be anything static, or you can generate it through //built-in random functions//The below url accepts AppName, AppInfo & SecretCode
$cURLConnection = curl_init("https://www.authenticatorapi.com/pair.aspx?AppName=GAC&AppInfo=Onlinebanking&SecretCode=$random_code");//Setting Options for the cURL Request
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);//Execute the Request
$apiResponse = curl_exec($cURLConnection);//Close
curl_close($cURLConnection);//Displaying the QR Code
echo $apiResponse;
echo $random_code;
?>


