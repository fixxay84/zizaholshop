<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin') ?>">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">List Report</li>
  </ol>
</nav>

<div class="row">
<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
  <div class="card" style="width: 18rem;">
    <img class="card-img-top" src="<?php echo base_url('assets/img/chart1.jpg') ?>" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Chart - Count of Trx Status</h5>
      <p class="card-text">Chart berupa Diagram yang menyajikan Count of Trx Status</p>
      <a href="<?php echo base_url('admin/getchart_status_trx') ?>" class="btn btn-primary">Go </a>
    </div>
  </div>
</div>

<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
  <div class="card" style="width: 18rem;">
    <img class="card-img-top" src="<?php echo base_url('assets/img/chart2.jpg') ?>" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Chart - Count of Member</h5>
      <p class="card-text">Chart berupa Diagram yang menyajikan Count of Member All Periode</p>
      <a href="<?php echo base_url('admin/getchart_member') ?>" class="btn btn-primary">Go </a>
    </div>
  </div>
</div>

<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
  <div class="card" style="width: 18rem;">
    <img class="card-img-top" src="<?php echo base_url('assets/img/chart3.jpg') ?>" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Chart - Count of Kategori Product</h5>
      <p class="card-text">Chart berupa Diagram yang menyajikan Count of Product All Periode</p>
      <a href="<?php echo base_url('admin/getchart_product') ?>" class="btn btn-primary">Go </a>
    </div>
  </div>
</div>

</div>