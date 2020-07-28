
<div class="modal fade details-1" id="details-104" tableindex="-1" role="dialog" aria-labelledby="details-104" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
      <h4 class="modal-title text-center" style="font-weight: bold">Registration</h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8" style="float:none; margin: 0 auto;">
                <div class="form-group">
                  <div class="col-sm">
                    <form method = "post" enctype="multipart/form-data"   >
                    <label for="vardas" id="product-title">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="e.g. Rapolas">
                  </div><br/>
                  <div class="col-sm">
                    <form method = "post" enctype="multipart/form-data"   >
                    <label for="pavarde" id="product-title">Last name:</label>
                    <input type="text" class="form-control" id="surname" name="surname" placeholder="e.g. Vasiliauskas">
                  </div><br/>
                    <div class="col-sm">
                     <label for="e-mail" id="product-description">E-MAIL:</label>
                     <input type="text" class="form-control" id="e-mail" name="e-mail" placeholder="e.g. user@domain.com">
                   </div><br/>
                   <div class="col-sm">
                    <label for="username" id="product-description">Nickname:</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="e.g. Zebas">
                  </div><br/>
                   <div class="col-sm">
                     <form method = "post" enctype="multipart/form-data"   >
                     <label for="pavarde" id="product-title">Password:</label>
                     <input type="password" class="form-control" id="password" name="password" placeholder= "e.g. Password123">
                   </div><br/>

                   <input type="submit" value="Click to finish &hellip;" name = "submituser" onclick="location.replace("index.php") >
                     </form>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
   if(isset( $_POST['submituser'])) {

     require_once 'core/init.php';
     $name =  $_REQUEST['name'];
     $surname =  $_REQUEST['surname'];
     $email =  $_REQUEST['e-mail'];
     $username =  $_REQUEST['username'];
     $password =  $_REQUEST['password'];

  if (empty($name) || empty($surname) || empty($email) || empty($username) || empty($password)) {
    echo ("Please fill in all the fields");
  }
    else {
      if (!preg_match("/^[a-zA-Z]*$/", $name) || !preg_match("/^[a-zA-Z]*$/", $surname)) {
        echo ("Incorrect name and/or last name");
      }
        else {
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo ("E-mail format not supported");
              }
                else {
                  //hashing password
                  $hashedpsw = password_hash($password, PASSWORD_DEFAULT);
                  $sql =  "INSERT INTO users(user_first, user_last, user_email, user_uid, user_pwd) VALUES ('$name', ' $surname', '$email', '$username', '$hashedpsw')";
                    echo ("Registration successful!");
                  $featured = $db->query($sql);
              }
  }
  }
}
?>
