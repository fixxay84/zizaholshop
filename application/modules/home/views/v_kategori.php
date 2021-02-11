      <section class="text-center mb-4">

        <!--Grid row-->
        <div class="row wow fadeIn">

          <!--Grid column-->
          <?php foreach($product as $p): ?>
          <div class="col-lg-3 col-md-6 col-sm-4 mb-4">

            <!--Card-->
            <div class="card">

              <!--Card image-->
              <!-- Loop -->
              <div class="view overlay">
                <img src="<?php echo base_url('/upload/product/'). $p['gambar_product'] ?>" class="card-img-top"
                  alt="">
                <a href="<?php echo base_url('home/productDetail/'). $p['nama_product']; ?>">
                  <div class="mask rgba-white-slight"></div>
                </a>
              </div>
              <!--Card image-->

              <!--Card content-->
              <div class="card-body text-center">
                <!--Category & Title-->
                <h5>
                  <a href="" class="grey-text">
                    <h6><?php echo ucwords($p['kategori']) ?></h6>
                  </a>
                  <strong class="h6">
                    <a href="" class="dark-grey-text"><?php echo $p['nama_product'] ?></a>
                  </strong>
                </h5>

                <h4 class="font-weight-bold blue-text">
                  <strong><?php echo 'Rp. '. number_format($p['harga'], 0,',','.'); ?></strong>
                </h4>

              </div>
              <!--Card content-->

            </div>
            <!--Card-->

          </div>
          <?php endforeach; ?>

        </div>
        <!--Grid row-->

      </section>
      <!--Section: Products v.3-->

      <!--Pagination-->
            <?php echo $this->pagination->create_links(); ?>
      <!--Pagination-->
    

    </div>

      <!-- maps -->
      <div class="container" id="contact">
        <div class="row">
          <!-- end single footer -->
          <div class="col-md-6 col-sm-4 col-xs-12" data-aos="fade-up" data-aos-once="true" data-aos-duration="1000">
            <div class="footer-content">
              <div class="footer-head">
                <h4>Information</h4>
                <p>
                  Jl. Flamboyan Raya No.70, Rt.001/002 Kel. Rempoa Kec. Ciputat Timur
                  Tanggerang Selatan, Banten 15412                
                </p>
                <div class="footer-contacts">
                  <p><span>Tel:</span> +62 878 828282 43</p>
                  <p><span>Email:</span> <a href="mailto:azizahasad85@gmail.com">azizahasad85@gmail.com</a></p>
                  <p><span>Website:</span> <a href="<?php echo base_url()?>">www.zizaholshop.store</a></p>
                  <p><span>Jam Operasional:</span> 08.00-17.00 WIB</p>
                </div>
              </div>
            </div>
          </div>
          <!-- end single footer -->
          <div class="col-md-6 col-sm-4 col-xs-12" data-aos="fade-up" data-aos-once="true" data-aos-duration="1000">
            <div class="footer-content">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d781.2622700978964!2d106.75821400787761!3d-6.283928704063171!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f039cd76e855%3A0x316d4ad107e1a3fd!2zNsKwMTcnMDAuNiJTIDEwNsKwNDUnMjkuMCJF!5e0!3m2!1sid!2sid!4v1566745371441!5m2!1sid!2sid" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>
          </div>
        </div>
      </div>
  </main>
  <!--Main layout-->

  