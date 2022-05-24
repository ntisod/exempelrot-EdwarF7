<?php
require("includes/wsp1-functions.php");

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
        $usernameErr = " Användarnamnet finns inte i databasen.";
        $errors++;
    }
  }

  if(empty($_POST["pw"])){
    $pwErr = "Du måste ange lösenord!";
    $errors++;
  } else{
    $pw = $_POST["pw"];
    }
  }

  echo "Antal fel: $errors" ;
    
  //Kontrollera om det inte finns errors
  if($errors<1){
    //Hämta db-inställningar
    require("includes/settings.php");
    
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbuser, $dbpw);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $hashed_pw = password_hash($pw, PASSWORD_DEFAULT);
      $sql = "SELECT password FROM users WHERE username = '$username'";
      // use exec() because no results are returned
      $conn->exec($sql);
      echo ".";


    } catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }

    include("templates/head.php");

    $conn = null;
    //Tar oss till en annan sida
    header("Location: welcome.php");

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
} 

?>

<h2>Logga in</h2>
<p><span class="error">* Obligatorisk uppgift</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  
  <p>
    <label for="username"> Användarnamn:</label> 
    <input type="text" name="username" value="<?php echo $username;?>">
    <span class="error">* <?php echo $usernameErr;?></span>
  </p>
  
  <p>
    <label for="pw"> Lösenord:</label> 
    <input type="password" name="pw" value="<?php echo $pw;?>">
    <span class="error">* <?php echo $pwErr;?></span>
  </p>
  <br><br>
  <input type="submit" name="submit" value="Logga in"> 
</form>

<?php
echo "<h2>Din inmatning:</h2>";
echo $username;
echo "<br>";
echo $pw;

include("../templates/foot.php");

?>

</body>
</html>