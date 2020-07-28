<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Beyblades</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<?php
session_start();
require_once 'core/init.php';
if (isset($_POST['submit'])) {

$uid = mysqli_real_escape_string($db, $_POST['uid']);
$pwd = mysqli_real_escape_string($db, $_POST['pwd']);

if (empty($uid) || (empty($pwd))) {
echo "Neįvedėte duomenų";
}
else {
  $sql = "SELECT * FROM users WHERE user_uid = '$uid'";
  $result = mysqli_query($db, $sql);
  $resultCheck = mysqli_num_rows($result);
        if ($resultCheck < 1) {
          echo "<div class=alert alert-warning>
		  Incorrect username or password!
		  </div>";
        }
        else {
          if ($row = mysqli_fetch_assoc($result)) {
            $hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
            if ($hashedPwdCheck == false) {
              echo "Incorrect password!";
            }
            elseif ($hashedPwdCheck == true) {
              $_SESSION['u_id'] = $row['user_id'];
              $_SESSION['u_first'] = $row['user_first'];
              $_SESSION['u_last'] = $row['user_last'];
              $_SESSION['u_email'] = $row['user_email'];
              $_SESSION['u_uid'] = $row['user_uid'];
              echo 
			  "<div class=alert alert-warning></div>";
              header("Location: ../e-shop/index.php");
          }
          }
        }
}
}
  ?>
 <html>
