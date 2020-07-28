
<?php
include 'core/init.php';
include 'login.php';

 include 'Cart.php';
 $cart = new Cart;

 if($cart->total_items() <= 0){
    header("Location: index.php");
 }


$_SESSION['sessCustomerID'] = $_SESSION['u_id'] ;

//accessina db tik kai logged in
$query = $db->query("SELECT * FROM users WHERE user_id = ".$_SESSION['sessCustomerID']);
if(isset($_SESSION['sessCustomerID'])){
$custRow = $query->fetch_assoc();
}


 ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    .container{width: 100%;padding: 50px;}
    .table{width: 65%;float: left;}
    .shipAddr{width: 30%;float: left;margin-left: 30px;}
    .footBtn{width: 95%;float: left;}
    .orderBtn {float: right;}
    </style>
</head>
<body>
<div class="container">
    <h1>Checkout</h1>
    <table class="table">
    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if($cart->total_items() > 0){
            //get cart items from session
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
        ?>
        <tr>
            <td><?php echo $item["name"]; ?></td>
            <td><?php echo '€ '.$item["price"].' EUR'; ?></td>
            <td><?php echo $item["qty"]; ?></td>
            <td><?php echo '€ '.$item["subtotal"].' EUR'; ?></td>
        </tr>
        <?php } }else{ ?>
        <tr><td colspan="4"><p>There's nothing here!</p></td>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3"></td>
            <?php if($cart->total_items() > 0){ ?>
            <td class="text-center"><strong>Total <?php echo '€ '.$cart->total().' EUR'; ?></strong></td>
            <?php } ?>
        </tr>
    </tfoot>
    </table>
    <div class="shipAddr">
        <h4>Needed information:</h4>
        <hr>
<?php

		if(isset($_SESSION['sessCustomerID'])){ 
        echo '<p><mark>Name:</mark>'; 
		echo $custRow['user_first']; 
		echo '</p>';
        echo '<p><mark>Last name:</mark>'; 
		echo $custRow['user_last']; 
		echo '</p>';
        echo '<p><mark>E-mail:</mark>'; 
		echo $custRow['user_email']; 
		echo '</p>';
		
		echo '<p><mark>Payment method</mark></p>';
		echo'</td>';
		echo '<td valign="top">';
		echo '<select name="pay">';
		echo '<mark><option value="paypal">Paypal</option></mark>';
		echo '<option value="visa">Visa</option>';
		echo '<option value="mastercard">MasterCard</option>';
		echo '<option value="debit_card">Debit Card</option>';
		echo '</select>';
		echo '</td>';
		
		}
		else {
			echo '<p>Please log in to be able to checkout</p>';
		}
?>

    </div>
	
    <div class="footBtn">
        <a href="index.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i>Continue shopping...</a>
		
		<?php 
		if(isset($_SESSION['sessCustomerID'])){ 
        echo '<a href="cartAction.php?action=placeOrder" class="btn btn-success orderBtn">Submit <i class="glyphicon glyphicon-menu-right"></i></a>';
		}
		?>
    </div>
</div>

</body>
</html>
