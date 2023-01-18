<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDBPDO";

if(empty($_POST["firstname"]) && empty($_POST["lastname"]) && empty($_POST["email"]) && empty($_POST["email"])){

    echo "Please enter your first name";
    echo "and your last name";
    
}else{

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  $stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (:firstname, :lastname, :email)");
  $stmt->bindValue(':firstname', $firstname, PDO::PARAM_STR);
  $stmt->bindValue(':lastname', $lastname, PDO::PARAM_STR);
  $stmt->bindValue(':email', $email, PDO::PARAM_STR);
  
  $stmt->execute();
  echo "New record created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

}

$conn = null;
?>