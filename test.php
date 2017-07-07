<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <a href="?a=123">click</a><br>
</body>
</html>
<?php
echo isset($_GET['a'])?$_GET['a']:'还没传值';
?>