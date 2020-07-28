<?php
$sql = "SELECT * FROM produktai WHERE featured = 1 and id = 2";
$featured = $db->query($sql);
 ?>
<div class="modal fade details-1" id="details-2" tableindex="-1" role="dialog" aria-labelledby="details-2" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
      <?php while($product = mysqli_fetch_assoc($featured)) : ?>
      <h4 class="modal-title text-center"><?=$product['pavadinimas'];?></h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <div class="center-block">
                <img src="<?=$product['nuotrauka']; ?>" alt="<?=$product['pavadinimas'];?>" class="details img-responsive">
              </div>
            </div>
            <div class="col-sm-6">
        <h4>About</h4>
              <p><?=$product['aprasymas'];?></p>
              <hr>
              <p>Price: <span class="priceB">€ <?=$product['kaina'];?><span></p>
              <p>Release date: <?=$product['metai'];?></p>
            </div>
            <?php endwhile; ?>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <?php
        //get rows query
        $query = $db->query("SELECT id FROM produktai where id=2");
        if($query->num_rows > 0){
            while($row = $query->fetch_assoc()){
        ?>

        <a class="btn btn-warning" href="cartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>">Add to cart</a>

        <?php } }else{ ?>
      <p>No products found.</p>
      <?php } ?>
        <button class="btn btn-default" data-dismiss="modal">Return</button>
      </div>
    </div>
  </div>
</div>
