<?php
  include_once 'login.php';
  require_once 'core/init.php';
  $sql = "SELECT * FROM produktai WHERE featured = 7";
  $sql2 = "SELECT * FROM brand WHERE id = 2";
  $sqlkat = "SELECT * FROM kategorijos";
  $featured = $db->query($sql);
  $featured2 = $db->query($sql2);
  $last_id = mysqli_insert_id($db);

  if(isset( $_POST['submitprod'])) {
    header("Refresh:0");
    header("Refresh:0");
  }

  $featuredprod = 7;
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Beylocker</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
  <?php
    $sql = "SELECT * FROM kategorijos WHERE parent = 0";
    $pquery = $db->query($sql);
  ?>
  <nav class="navbar navbar-default navbar-fixed-top" id="navbar">
    <div class="container">
      <ul class="nav navbar-nav">
        <?php while($parent = mysqli_fetch_assoc($pquery)) : ?>
        <?php
          $parent_id = $parent['id'];
          $sql2 = "SELECT * FROM kategorijos WHERE parent = '$parent_id' ";
          $cquery = $db->query($sql2);
          $adress_id = $parent['adresas'];
        ?>

<!-- Drop down meniu -->
        <li class="dropdown">
          <?php if($parent_id <4) :?>
            <a href="<?=$parent['adresas']; ?>" id="text"><?php echo $parent['kategorija']; ?></a>
          <?php endif; ?>
          <?php if($parent_id >=4) :?>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="text"><?php echo $parent['kategorija']; ?><span class="caret"></span></a>
          <?php endif; ?>
          <ul class="dropdown-menu" role="menu">
            <?php while($child = mysqli_fetch_assoc($cquery)) : ?>
            <li>
              <a href="<?=$child['adresas']; ?>">
                <?php echo $child['kategorija'] ?>
              </a>
            </li>
          <?php endwhile; ?>
          </ul>
        </li>
      <?php endwhile; ?>

      <li>
        <form action="#" >
				<?php 
		if (isset($_SESSION['u_id'])){
			if($_SESSION['u_id'] == '15'){
		  echo '<button class="btn btn-default navbar-btn" data-toggle="modal" data-target="#details-101">Add new product</button>';
			}
		}
		?>
          <button class="btn btn-default navbar-btn" data-toggle="modal" data-target="#details-104" style="float: left; margin-right: 5px;">Sign up</button>
          <button class="btn btn-default navbar-btn" data-toggle="modal" data-target="#details-105"><span class="glyphicon glyphicon-shopping-cart" ></span></button>
          <button class="btn btn-default navbar-btn" data-toggle="modal" data-target="#details-106"><span class="glyphicon glyphicon-search"></span></button>
        </form>
        <?php
        if (isset($_SESSION['u_id'])){
            echo '<form action = "logout.inc.php" method = "POST"><button type="submit" name="submit" onclick = "set()">LOGOUT</button></form>';
          } else {
            echo '<form action = "login.php" method = "POST"> <input type="text" name="uid" placeholder="USERNAME">
                          <input type="password" name="pwd" placeholder="PASSWORD">
                         <button type="submit" name="submit">LOGIN</button> </form>';
          }

        function set () {
          session_start();
          session_unset();
          session_destroy();
        }
         ?>
      </li>
      
      </ul>
    </div>
  </nav>
  
  <!-- Headeris -->
  <div id="background-image">

  </div>

  <div class="col-md-2">

  </div>

  <div class="col-md-8" style="padding-top: 30px;">
    <div class="row">
    <?php while($product = mysqli_fetch_assoc($featured2)) : ?>
      <h2 class="text-center"><?=$product['brand']; ?> Products</h2>
      <img src="<?=$product['nuotrauka']; ?>" class="img-responsive center-block">
    <?php endwhile; ?>
   <?php while($product = mysqli_fetch_assoc($featured)) : ?>
       <div class="col-md-3">
        <h4><?=$product['pavadinimas'];?></h4>
        <img src="<?=$product['nuotrauka']; ?>" alt="<?=$product['pavadinimas']; ?>" id="images">
        <p class="price">Price: €<?=$product['kaina']; ?></p>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#details-<?=$product['details'];?>">Read more...</button>
		        <?php
        $query = $db->query("SELECT id FROM produktai where id=2");
        if($query->num_rows > 0){
            while($row = $query->fetch_assoc()){
        ?>
		
 <a class="btn btn-success" href="cartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>">Add to cart</a>

        <?php } }else{ ?>
      <p>No products found.</p>
      <?php } ?>
      </div>
    <?php endwhile; ?>
    </div>
  </div>

    
	</div>
  </div>
  <footer style="line-height:50px;" class="navbar navbar-fixed-bottom" id="footer">&copy; 2019 - <strong>Rapolas ir Laisvis</strong> <i>MKDF 16/3</i></footer>

  <?php
		include 'pop-newproduct.php';
		include 'pop-hasbro-evipero.php';
        include 'pop-create-user.php';
		include 'pop-hasbro-roktador.php';
		include 'pop-hasbro-spryzen.php';
  ?>

</body>

</html>
