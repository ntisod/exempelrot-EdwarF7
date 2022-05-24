<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> Highscore: </h1>
    <?php
    $hs = array("Edwar"=>"96050", "Tobias"=>"57210", "Andreas"=>"62136", "Lorenzo"=>"18514", "Elias"=>"6166");
    arsort($hs);

    echo "<ol>";
    foreach($hs as $x => $x_value){
        echo "<li> $x has $x_value points.";
    }
    echo "</ol>";

    ?>
</body>
</html>
<?php 

