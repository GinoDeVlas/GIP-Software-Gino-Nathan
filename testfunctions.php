<?php
function GenQR(){
    //A random Code for the request to the API
    $str=rand();
    $result=md5($str);
    $_SESSION['2fa_str']=$result;
    // echo $result;
    //Random Code can be anything static, or you can generate it through //built-in random functions//The below url accepts AppName, AppInfo & SecretCode
    $cURLConnection = curl_init("https://www.authenticatorapi.com/pair.aspx?AppName=GAC&AppInfo=Onlinebanking&SecretCode=$result");//Setting Options for the cURL Request
    curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);//Execute the Request
    $apiResponse = curl_exec($cURLConnection);//Close
    curl_close($cURLConnection);//Displaying the QR Code
    echo $apiResponse;
}
function ValiQR($pin){
        $pin = (int)$pin;
        $secret_code = $_SESSION['2fa_str'];
      //The secret code will be the same code that you specified while displaying the QR Code 
        $cURLConnection = curl_init('https://www.authenticatorApi.com/Validate.aspx?Pin='.$pin.'&SecretCode='.$secret_code);curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);$apiRes = curl_exec($cURLConnection);
        curl_close($cURLConnection);$jsonArrayResponse = json_decode($apiRes);
        if ($apiRes == 'True') {
        //The PIN Code is correct, you can either display a success 
        echo "<br> Code is juist";
      // message here or just grant access to the user
      }
      else {
          echo "<br> Code is fout ";
      //Invalid 6 Digit PIN
      }
}
function ShowQR(){
    $result=$_SESSION['2fa_str'];
    echo $result;
    $cURLConnection = curl_init("https://www.authenticatorapi.com/pair.aspx?AppName=GAC&AppInfo=Onlinebanking&SecretCode=$result");//Setting Options for the cURL Request
    curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);//Execute the Request
    $apiResponse = curl_exec($cURLConnection);//Close
    curl_close($cURLConnection);//Displaying the QR Code
    echo $apiResponse;
}
?>