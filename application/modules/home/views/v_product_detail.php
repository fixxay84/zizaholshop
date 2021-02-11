<!-- chat WhatsApp -->
<!--   <a href="<?php echo base_url('home/downloadapk') ?>" target="_blank"><img src="<?php echo base_url();?>assets/img/apk1.png" width="110px" style="position: fixed;bottom: 25px; right: 20px;z-index: 5;" class="animated swing" id="iconapk">
  </a> -->
  
<!--     <a class="nav-link waves-effect" href="<?php echo base_url('member/show_cart') ?>" style="position: fixed;bottom: 25px;z-index: 5;right: 20px;transform: rotateY(180deg);">
    <i class="fas fa-shopping-cart" style="font-size: 45px;color: #57BB63;"></i>
    <span class="badge red z-depth-1 mr-1"><?php echo count($this->cart->contents()) ?> </span>
  </a> -->


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
          <div class="p-4">
            <input type="hidden" value="<?php echo $productdetail['id'] ?>">
            <p class="lead font-weight-bold"><?php echo $productdetail['nama_product'] ?></p>
            <p class="lead">
              <span><?php echo 'Rp '. number_format($productdetail['harga'], 0,',','.'); ?></span>
            </p>
            <p><?php echo $productdetail['deskripsi'] ?></p>
            <h5>
              <?php if($productdetail['stock']==0): ?>
                <small class="text-danger">Out of Stock</small>
                <?php else: ?>
                <small class="text-info">Jumlah Stock : <?php echo $productdetail['stock'] ?></small>
              <?php endif; ?>
            </h5>
          </div>
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
          <a href="<?php echo base_url('home/productDetail/'. $pr['nama_product']) ?>">
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