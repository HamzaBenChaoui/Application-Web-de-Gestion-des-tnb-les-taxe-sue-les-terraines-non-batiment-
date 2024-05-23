<?php
session_start();
$email2 = $_POST['user_username'];
$password = $_POST['user_password'];
$_SESSION['user_username']=$email2;
$_SESSION['user_password']=$password;
if (!empty($email2) || !empty($password)) {
  $host = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $dbname = "tnb";
  // Create connection
  $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
  if (mysqli_connect_error()) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
      . mysqli_connect_error());
  } else {
    $SELECT ="SELECT * FROM terraines WHERE cin = ? AND Titre_Foncier = ? LIMIT 1";
    //Prepare statement
    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("ss", $email2, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 0) {
      echo "Invalid email or password";
    } else {
      // Fetch the user data if needed
      $user = $result->fetch_assoc();
      // Redirect to the desired location
      header("Location: payment.php");
      exit(); // Make sure to exit after redirecting
    }
    $stmt->close();
    $conn->close();
  }
} else {
  echo "All fields are required";
  die();
}
?>