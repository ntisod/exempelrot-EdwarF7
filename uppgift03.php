<?php
    header("Content-type: text/html; charset=utf-8");
    empty($_GET['namn']);
    $t = date("H");

    
    if ($t < "6") {
        echo "Ha en god morgon!";
      } elseif ($t < "12") {
        echo "Ha en god förmiddag!";
      } elseif ($t < "15") {
        echo "Ha en god dag!";
      } elseif ($t < "18") {
        echo "Ha en god eftermiddag!";
      } elseif ($t < "20"){
        echo "Ha en god kväll!";
      } else{
        echo "Ha en god natt!";
      }