<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./test.css">
</head>
<body>
<div id="loader-wrapper">
       <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
        <lottie-player src="https://assets4.lottiefiles.com/private_files/lf30_zg4oeggu.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
</div>
   <?php 
   for ($i=0; $i < 10000; $i++) { 
    echo "<h1>Helo</h1>";
   }
   ?>
    <script>
        var loader= document.getElementById('loader-wrapper');
        window.addEventListener("load", function(){
            loader.style.display="none";
        })
    </script>
</body>
</html>
    