<?php
session_start();
session_unset();
session_destroy();
header("location: ../e-shop/index.php");
exit();
?>
