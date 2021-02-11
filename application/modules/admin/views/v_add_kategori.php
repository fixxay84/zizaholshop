<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin') ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/kategori') ?>">Kategori</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add New Kategori</li>
  </ol>
</nav>
<!-- Session Message -->
<div class="row">
  <div class="col-md-6">
    <?php 
      if($this->session->flashdata('message')){
        echo $this->session->flashdata('message');
      }
    ?>
  </div>
</div>

<div class="row">
    <div class="col-4 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <br>
          <form class="forms-sample" action="<?php echo base_url('admin/aksiTambahKategori'); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="kategori">Nama Kategori</label>
              <input type="text" class="form-control text-uppercase" id="kategori" name="kategori">
            </div>
            <button type="submit" class="btn btn-sm btn-primary mr-2" name="submit">Submit</button>
            <a href="<?= base_url('product') ?>" class="btn btn-sm btn-dark">Cancel</a>
          </form>
        </div>
      </div>
    </div>
</div>

