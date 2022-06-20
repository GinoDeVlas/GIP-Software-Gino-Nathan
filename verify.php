<!DOCTYPE html>
<html>
    <head>
        <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
<body>
</body> 
</html>
<?php
include 'connection.php';
if (isset($_GET['Token'])) {
    //Process verification
    $Token =  $_GET['Token'];
    $Result = $conn->query("SELECT IDKlantenummer, Confirmatie, Token From tblklantengegevens WHERE Confirmatie = 0 AND Token = '$Token' LIMIT 1");
    if ($Result->num_rows == 1) {
        //set session id
        $row = $Result->fetch_array();
        $_SESSION['id'] = $row['IDKlantenummer'];

        //Validate Email
        $update = $conn->query("UPDATE tblklantengegevens set Confirmatie = 1 Where Token = '$Token'");
        if ($update) {
            header('./dashboard.php');
        }else {
            echo $conn->error;
        }
        //redirect to dashboard
        echo "<script>
        setTimeout(function () {    
            window.location.href = 'https://archief.vhsj.be/websites/6itn/gip12/GIP-Software-Gino-Nathan/signup.php'; 
        },2000); // 5 seconds
        </script>";
    }else {
        echo '<script type="text/javascript">
        $(document).ready(function() {
            swal({
                title: "Er is iets mis gegaan!",
                text: "Het account is al eerder geverifieerd!!",
                icon: "warning",
                button: "Ok",
                timer: 20000
            });
        });
    </script>';
    echo "<script>
    setTimeout(function () {    
        window.location.href = 'https://archief.vhsj.be/websites/6itn/gip12/GIP-Software-Gino-Nathan/signup.php'; 
    },2000); // 5 seconds
    </script>";
    }
}else {
    echo '<script type="text/javascript">
    $(document).ready(function() {
        swal({
            title: "Er is iets mis gegaan!",
            text: "Probeer het later opnieuw!!",
            icon: "error",
            button: "Ok",
            timer: 20000
        });
    });
</script>';
echo "<script>
setTimeout(function () {    
    window.location.href = 'https://archief.vhsj.be/websites/6itn/gip12/GIP-Software-Gino-Nathan/signup.php'; 
},2000); // 5 seconds
</script>";


}
?>

