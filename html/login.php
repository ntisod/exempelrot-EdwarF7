<?php
require("../includes/wsp1-functions.php");

// define variables and set to empty values
$pwErr = $usernameErr = "";
$pw = $username = "";
//Antal fel
$errors = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $usernameErr = "Du måste skriva användarnamn";
    $errors++;
  } else {
    $username = test_input($_POST["username"]);
    if(!testUserExist($username)){
    $usernameErr = "Användarnamnet Finns inte.";
    $errors++;  
    }
  }

  if(empty($_POST["pw"])){
    $pwErr = "Du måste ange lösenord!";
    $errors++;
  } else{
    $pw = $_POST["pw"];

  }
  
  //Kontrollera om det inte finns errors
  if($errors<1){
    //Hämta db-inställningar
    require("../includes/settings.php");
    
    //Hämta hashat lösenord från DB
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbuser, $dbpw);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "SELECT password FROM users WHERE username = :username LIMIT 1";

      $stmt = $conn->prepare($sql);
      $stmt->bindValue("username", $username);
      $stmt->execute();

      // set the resulting array to associative
      $resultat = $stmt->fetch(PDO::FETCH_ASSOC);

      //Kolla om inskrivet lösenord stämmer överens med lösenordet i DB.
      $verified = password_verify($pw, $resultat["password"]);
 
      //Låt olika saker hända beroende på om man skrivit rätt lösenord eller inte
      if($verified){
        //Ta oss till en annan sida
        header("Location: welcome.php");   
    } else{
          echo "Fel lösenord, eller användarnamn.";
      }
  
    } catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
} 

$title = "Logga in";
include("../templates/head.php");

?>

<h2>Logga in</h2>
<p><span class="error">* Obligatorisk uppgift</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  
  <p>
    <label for="username"> Användarnamn:</label> 
    <input id="username" type="text" name="username" value="<?php echo $username;?>">
    <span class="error">* <?php echo $usernameErr;?></span>
  </p>
  
  <p>
    <label for="pw"> Lösenord:</label> 
    <input id="pw" type="password" name="pw" value="<?php echo $pw;?>">
    <span class="error">* <?php echo $pwErr;?></span>
  </p>

 <br><br>
  <input id="submit" type="submit" name="submit" value="Logga in"> 
</form>

<?php

include "../templates/foot.php";

?>

</body>
</html>