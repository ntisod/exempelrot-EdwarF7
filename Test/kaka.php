<?php

setcookie("wsp1-user", "Edwar",time() + 60*5, "/");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
    if(!isset($_COOKIE["wsp1-user"])) {
        echo "Cookie named " . "wsp1-user" . " is not set!";
} else {
  echo "Cookie '" . "wsp1-user" . "' is set!<br>";
  echo "Value is: " . $_COOKIE["wsp1-user"];
    }

?>

</body>
</html>