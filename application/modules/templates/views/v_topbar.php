  <!-- jumbotron -->
  <div class="jumbotron card card-image container" style="background-image: url('http://drive.google.com/uc?export=view&id=1zlL4augXwCQDULDbJUHSxqYphUDSFUCa'); background-repeat: no-repeat; background-size: cover!important;margin-top: 80px;">
    <div class="text-white text-center py-5 px-4">
      <div>
        <h2 class="card-title h1-responsive pt-3 mb-5 mt-5 font-bold"><strong>Zie Zhop | Busana Masa Kini</strong></h2>
        <a class="btn btn-secondary btn-md"><i class="fas fa-chevron-down"></i> &nbsp&nbsp&nbspScroll Down</a>
      </div>
    </div>
  </div>
  <!-- jumbotron -->

<!-- chat WhatsApp -->
  <a href="https://wa.me/6287882828243" target="_blank"><img src="<?php echo base_url();?>assets/img/wa_2.png" width="50px" style="position: fixed;bottom: 25px; right: 20px;z-index: 5;" class="animated swing" id="iconapk">
  </a>
<!--   <a class="nav-link waves-effect" href="<?php echo base_url('member/show_cart') ?>" style="position: fixed;bottom: 25px;z-index: 5;right: 20px;transform: rotateY(180deg);">
    <i class="fas fa-shopping-cart" style="font-size: 45px;color: #57BB63;"></i>
    <span class="badge red z-depth-1 mr-1"><?php echo count($this->cart->contents()) ?> </span>
  </a> -->
  <!--Main layout-->
  <main>

    <!-- Categori -->
    
    <div class="container" id="product">
    <!--Navbar-->
      <nav class="navbar navbar-expand-lg navbar-dark mdb-color lighten-3 mt-3 mb-5">

        <!-- Navbar brand -->
        <!-- <span class="navbar-brand">All:</span> -->

        <!-- Collapse button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
          aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible content -->
        <div class="collapse navbar-collapse" id="basicExampleNav">

          <!-- Links -->
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url() ?>">All Categories
              </a>
            </li>

            <?php foreach($kategori as $k): ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('home/kategori/'. $k['kategori']) ?>"><?php echo ucwords($k['kategori']) ?>
              </a>
            </li>
            <?php endforeach; ?>

          </ul>
          <!-- Links -->
        </div>
        <!-- Collapsible content -->

      </nav>
      <!--/.Navbar-->