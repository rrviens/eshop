<?php

if(!isset($_REQUEST['id'])){
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Beyblades order.</title>
    <meta charset="utf-8">
    <style>
    .container{width: 100%; height: 50%; padding: 50px; text-align: center;}
    p{color: #34a853;font-size: 18px;}
    </style>
</head>
</head>
<body>

<div class="container">
    <h1>ORDER IS SUCCESSFUL</h1>
    <p>Your order ID is <?php echo $_GET['id']; ?>. Thank you for choosing Beyblades DB! </p>
	<button class="btn btn-default" data-dismiss="modal" onClick="javascript:history.go(-1)">
	Back to shopping!
	</button>
</div>

<footer style="line-height:50px;" class="navbar navbar-fixed-bottom" id="footer">&copy; 2019 - <strong>Rapolas ir Laisvis</strong> <i>MKDF 16/3</i></footer>
</body>

</html>