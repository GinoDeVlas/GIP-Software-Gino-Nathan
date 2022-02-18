<?php

function check_login($con)
{

    if(isset($_SESSION['IDKlantenummer']))
    {

        $id = $_SESSION['IDKlantenummer'];
        $query = "Select * From tblklantengegevens where IDKlantenummer = '$id' limit 1";

        $result = mysqli_query($con,$query);
        if($result && mysqli_num_rows($result) > 0)
        {

            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }else {
    //redirect naar login
    header("Location: RegLogin.php");
    die;
    }  



}

?>