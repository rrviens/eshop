<?php
  require_once 'core/init.php';
  
      if(isset($_GET['keywords'])) {
          $keywords = $db->escape_string($_GET['keywords']);
  
          $query = $db->query("SELECT pavadinimas FROM produktai WHERE pavadinimas LIKE '%{$keywords}%'");
      }
  include_once 'login.php';
  $sql = "SELECT * FROM produktai WHERE featured = 1";
  $sql2 = "SELECT * FROM brand WHERE id = 1";
  $sqlkat = "SELECT * FROM kategorijos";
  $featured = $db->query($sql);
  $featured2 = $db->query($sql2);
  $last_id = mysqli_insert_id($db);

  if(isset( $_POST['submitprod'])) {
    header("Refresh:0");
    header("Refresh:0");
  }

  $featuredprod = 1;
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Beyblades | Search</title>
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
          <?php if($parent_id < 4) :?>
            <a href="<?=$parent['adresas']; ?>" id="text"><?php echo $parent['kategorija']; ?></a>
          <?php endif; ?>
          <?php if($parent_id >= 4) :?>
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
          <button class="btn btn-default navbar-btn" data-toggle="modal" data-target="#details-104" style="float: left; margin-right: 5px;">Sign up</button>
          <button class="btn btn-default navbar-btn" data-toggle="modal" data-target="#details-105"><span class="glyphicon glyphicon-shopping-cart"></span></button>
          <button class="btn btn-default navbar-btn" data-toggle="modal" data-target="#details-106"><span class="glyphicon glyphicon-search"></span></button>
		            <?php
          if (isset($_SESSION['u_id'])){
            echo '<form action = "logout.inc.php" method = "POST"><button type="submit" name="submit" onclick = "set()">LOGOUT</button></form>';
          } else {
            echo '<form action = "login.php" method = "POST" style="margin-left: 200px;"> <input type="text" name="uid" placeholder="USERNAME">
                          <input type="password" name="pwd" placeholder="PASSWORD">
                         <button type="submit" name="submit">LOGIN</button> </form>';
          }

          function set () {
            session_start();
            session_unset();
            session_destroy();
          }
           ?>
        </form>
      </li>

  <div class="row">
      <div class = "col-xs-6">

        <?php
          if(isset($_POST['submit'])) {
            require_once 'core/init.php';
            $cat_title = $_POST['cat_title'];
            $sql =  "INSERT INTO kategorijos(kategorija, id) VALUES ('$cat_title', 0)";
            $featured = $db->query($sql);
            header("Refresh:0");
          }
        ?>

        <?php
          if(isset($_POST['submit2'])) {
            require_once 'core/init.php';
            $subcat_title = $_POST['subcat_title'];
            $value = $_POST['myselect'];
            $sql =  "INSERT INTO kategorijos(kategorija, parent) VALUES ('$subcat_title', $value)";
            copy("empty.php","sukurtas"+$Last_id+".php");
            $featured = $db->query($sql);
            $last_id = mysqli_insert_id($db);
            $myfile = fopen('sukurtas'.$last_id.'.php', 'w');
            $sql =  "UPDATE kategorijos  SET adresas = 'sukurtas$last_id.php' WHERE id =LAST_INSERT_ID()";
            copy("empty.php","sukurtas".$last_id.".php");
            $featured = $db->query($sql);
            header("Refresh:0");
          }
      ?>

      <?php
        if(isset($_POST['submit3'])) {
          require_once 'core/init.php';
          $subcat_title_edit = $_POST['subcat_title_edit'];
          $value = $_POST['selektas'];
        $sql = "UPDATE kategorijos SET kategorija='$subcat_title_edit' WHERE id=$value";
          $hm = $db->query($sql);
          header("Refresh:0");
        }
        ?>
      </div>

  </div>
      </ul>
    </div>

  </nav>

  <!-- Headeris -->
  <div id="background-image">

  </div>

  <div class="col-md-2">

  </div>

  <div class="col-md-8">
    <div class="row" style="text-align:center;">
        <div class="result-count">
            <h1>Search Results</h1>
            <?php
                if($query->num_rows > 0) {
                    echo "Found ".$query->num_rows. ".";
                } else {
                    echo "Nothing found.";
                }
            ?>
    
            <?php
            if($query->num_rows) {
                while($r = $query->fetch_object()) {
                ?>
                    <div class="result">
                        <a href="#"><?php echo $r->pavadinimas;?></a>
                    </div>
                <?php
                }
            }?>
        </div>
    </div>
  </div>

  <footer style="line-height:50px;" class="navbar navbar-fixed-bottom" id="footer">&copy; 2019 - <strong>Rapolas ir Laisvis</strong> <i>MKDF 16/3</i></footer>

  <?php 
        include 'pop-create-user.php';
        include 'pop-cart.php';
        include 'pop-search.php';
  ?>

</body>

</html>
