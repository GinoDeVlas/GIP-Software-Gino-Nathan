<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./test.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="body" ng-app="myApp">
        <div class="wrapper" ng-controller="MyCtrl">
            <div class="info">Raw Value: {{phoneVal}}</div>
            <div class="info">Filtered Value: {{phoneVal | tel}}</div>

            <input class="input-phone" type='text' phone-input ng-model="phoneVal"/>
        </div>
    </div>
</body>
</html>
<script type="text/javascript" src="./test.js"></script>