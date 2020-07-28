<head>
  <meta charset="utf-8">
  <title>Beyblades</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="modal fade details-1" id="details-101" tableindex="-1" role="dialog" aria-labelledby="details-101" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
      <h4 class="modal-title text-center">Create new product</h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8" style="float:none; margin: 0 auto;">
                <div class="form-group">
                  <div class="col-sm">
                    <form method = "post" enctype="multipart/form-data"   >
                    <label for="title" id="product-title">Product name: </label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="e.g. Beyblade 45">
                  </div><br/>
                  <div class="col-sm">
                    <div class="col-sm">
                      <label for="pic" id="picture-upload">Photo of product:</label>
                        <input type="file" name="img" accept="image/*">
                    </div><br/>
                    <div class="col-sm">
                     <label for="description" id="product-description">Description:</label>
                     <input type="text" class="form-control" id="description" name="description" placeholder="e.g. Why it is significant?">
                   </div><br/>
                    <div class="col-sm">
                     <label for="year" id="product-year">Release year: </label>
                     <input type="number"  class="form-control" id="product_price" name="metai" placeholder="e.g. 2019">
                   </div><br/>
                   <div class="col-sm">
                     <label for="product_price" id="product-price">Price: </label>
                     <input type="number" class="form-control" id="product_price" name="kaina" placeholder="e.g. 20">
                   </div><br/>
                   <input type="submit" value="Submit" name = "submitprod" onclick="location.replace("index.php")">
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
</body>
<?php
   if(isset( $_POST['submitprod'])) {
     $uploads_dir = '/e-shop/img/';
     require_once 'core/init.php';

     $title =  $_REQUEST['title'];

     $target =   $uploads_dir.basename($_FILES['img']['name']);

     $image = $_FILES['img']['name'];

  //   move_uploaded_file(strtolower($_FILES['tmp_name']['name']), $uploads_dir);

     $kaina =  $_REQUEST['kaina'];


	 $metai = $_REQUEST['metai'];
     $sql =  "INSERT INTO produktai(pavadinimas, kaina, nuotrauka, featured) VALUES ('$title', '$kaina', '/e-shop/img/$image', $featuredprod)";
     $featured = $db->query($sql);
  //   header("Refresh:0");
}
?>
