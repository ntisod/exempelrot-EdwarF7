<!DOCTYPE html>

<?php
define("Bilar", [
  "Alfa Romeo är en italiensk biltillverkare med säte i Turin och grundad i Milano 1910.",
  "BMW är en tysk bil- och motorcykeltillverkare med huvudkontor i München.",
  "Toyota är en japansk företag",
  "Nissan Motors bilar såldes fram till början av 1980-talet även under namnet Datsun.",
  "Chevrolet är ett amerikanskt bilmärke grundat 1911 och som sedan 1918 ingår i General Motors.",
  "Ford är en amerikansk multinationell biltillverkare, grundad den 16 juni 1903 av Henry Ford.",
  "Dodge är min favorit bilmärke.",
  "Tesla är ett amerikanskt bil- och energiföretag med verksamhet inom elbilar."
]);
echo Bilar[array_rand(Bilar)];
?>

