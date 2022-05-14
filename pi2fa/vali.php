<form method="POST" >
    <div class="row">
      <div class="col-lg-4"></div>
<div class="form-group col-lg-4" style="float:center">
  <input type="text" class="form-control" min="4" name="pin" max="6" required/>
  <br><br>
  <input name="submit-pin" value="Enter" type="submit" class="btn btn-primary"></button>
</div>
<div class="col-lg-4"></div>
    </div>
    <?php
    session_start();
if (isset($_POST["submit-pin"])) {
  $pin = $_POST['pin'];
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
}}
?>
</form>
</div>