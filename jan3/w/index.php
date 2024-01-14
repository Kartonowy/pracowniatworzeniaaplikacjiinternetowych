<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <form action="" method="post">
        <input type="text" name="numbers" id="">
        <input type="submit" value="submit">
   </form> 
</body>
</html>

<?php

if (isset($_POST['numbers'])) {
    $poster =  $_POST['numbers'];
    $numbers = explode(',', $poster);
    echo "Lowest ". min($numbers);
    echo "Highest ". max($numbers);
    echo "average " . array_sum($numbers) / count($numbers);
    $temp = array_map(function ($e) { if ($e != 3) { return 0; } else { return $e; }}, $numbers);
    echo "<br> 3s: " . array_sum($temp) / 3 ;
}
