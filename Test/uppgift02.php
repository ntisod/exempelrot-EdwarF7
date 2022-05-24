<!DOCTYPE html>

<?php
define("Bilar", [
  "<strong>Alfa Romeo</strong> är en italiensk biltillverkare med säte i Turin och grundad i Milano 1910.",
  "<strong>BMW</strong> är en tysk bil- och motorcykeltillverkare med huvudkontor i München.",
  "<strong>Toyota</strong> är en japansk företag",
  "<strong>Nissan</strong> Motors bilar såldes fram till början av 1980-talet även under namnet Datsun.",
  "<strong>Chevrolet</strong> är ett amerikanskt bilmärke grundat 1911 och som sedan 1918 ingår i General Motors.",
  "<strong>Ford</strong> är en amerikansk multinationell biltillverkare, grundad den 16 juni 1903 av Henry Ford.",
  "<strong>Dodge</strong> är min favorit bilmärke.",
  "<strong>Tesla</strong> är ett amerikanskt bil- och energiföretag med verksamhet inom elbilar."
]);
echo Bilar[array_rand(Bilar)];
