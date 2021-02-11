<!-- chat WhatsApp -->
  <!--<a href="https://wa.me/6287882828243" id="wa" target="_blank"><img src="<?php echo base_url();?>assets/img/wa_2.png" width="50px" style="position: fixed;bottom: 55px; right: 20px;z-index: 5;">-->
  <!--</a>-->
  
  <a class="nav-link waves-effect" href="<?php echo base_url('member/show_cart') ?>" style="position: fixed;bottom: 25px;z-index: 5;right: 20px;transform: rotateY(180deg);">
    <i class="fas fa-shopping-cart" style="font-size: 45px;color: #000;"></i>
    <span class="badge red z-depth-1 mr-1"><?php echo count($this->cart->contents()) ?> </span>
  </a>


  <!--Main layout-->
  <main class="mt-5 pt-4">
    <div class="container dark-grey-text mt-5">

      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-6 mb-4">

          <img src="<?php echo base_url('upload/product/'. $productdetail['gambar_product']) ?>" class="img-fluid" alt="">

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-6 mb-4">

          <!--Content-->
          <form action="<?php echo base_url('member/add_cart') ?>" method="post">
          <div class="p-4">
            <input type="hidden" value="<?php echo $productdetail['id'] ?>" name="id">
            <p class="lead font-weight-bold"><?php echo $productdetail['nama_product'] ?></p>
            <input type="hidden" name="nama_product" value="<?php echo $productdetail['nama_product'] ?>">
            <input type="hidden" name="gambar_product" value="<?php echo $productdetail['gambar_product'] ?>">
            <input type="hidden" name="harga" value="<?php echo $productdetail['harga'] ?>">
            <input type="hidden" name="weight" value="<?php echo $productdetail['weight'] ?>">
            <p class="lead">
              <span><?php echo 'Rp '. number_format($productdetail['harga'], 0,',','.'); ?></span>
            </p>
            <p><?php echo $productdetail['deskripsi'] ?></p>
            <h5>
              <?php if($productdetail['stock']==0): ?>
                <small class="text-danger">Out of Stock</small>
                <?php else: ?>
                <small class="text-info">Jumlah Stock : <?php echo $productdetail['stock'] ?></small><br>
                <small class="text-info">Berat : <?php echo $productdetail['weight'] ?></small>
              <?php endif; ?>
            </h5>
            <?php if($productdetail['stock']==0): ?>
            <input type="number" class="form-control mb-2" placeholder="Masukkan Qty" disabled="" name="qty">
            <?php else: ?>
            <input type="number" class="form-control mb-2" placeholder="Masukkan Qty" name="qty">
            <?php endif; ?>
            <?php echo form_error('qty', '<small class="text-danger">', '</small>') ?>

            <?php if($productdetail['stock']==0): ?>
            <button class="btn btn-primary btn-block" type="submit" disabled="" name="beli">Beli</button>
            <?php else: ?>
            <button class="btn btn-primary btn-block" type="submit" name="beli">Beli</button>
            <?php endif; ?>
          </div>
          </form>
          <!--Content-->

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

      <hr>

      <!--Grid row-->
      <div class="row d-flex justify-content-center wow fadeIn">

        <!--Grid column-->
        <div class="col-md-6 text-center">

          <h4 class="my-4 h4">Produk Lainnya</h4>
        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

      <!--Grid row-->
      <div class="row wow fadeIn justify-content-center">

        <!--Grid column-->
        <?php foreach($product_random as $pr): ?>
        <div class="col-lg-4 col-md-12 mb-4">
          <a href="<?php echo base_url('member/productDetail/'. $pr['nama_product']) ?>">
          <img src="<?php echo base_url('/upload/product/'. $pr['gambar_product']) ?>" class="img-fluid" alt="">
          </a>
        </div>
        <?php endforeach; ?>
        <!--Grid column-->

      </div>
      <!--Grid row-->

    </div>
  </main>
  <!--Main layout-->