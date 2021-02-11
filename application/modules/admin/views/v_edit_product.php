<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin') ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/product') ?>">Product</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
  </ol>
</nav>
<!-- Session Message -->
<div class="row">
  <div class="col-md-8">
    <?php 
      if($this->session->flashdata('message')){
        echo $this->session->flashdata('message');
      }
    ?>
  </div>
</div>
<div class="row">
    <div class="col-lg-8 grid-margin stretch-card col-sm-">
      <div class="card">
        <div class="card-body">
          <br>
          <form class="forms-sample" action="<?php echo base_url('admin/updateProduct/'. $product['id']); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="merek">Nama Product</label>
              <input type="hidden" class="form-control text-uppercase" id="id" name="id" value="<?php echo $product['id'] ?>">
              <input type="text" class="form-control text-uppercase" id="nama_product" name="nama_product" value="<?php echo $product['nama_product'] ?>">
                <?php echo form_error('nama_product', '<small class="text-danger">', '</small>' ) ?>
            </div>
            <div class="form-group">
              <label for="Kategori">Jenis Kategori</label>
              <select class="form-control" name="kategori">
                <?php foreach($kategori as $k): ?>
                  <option value="<?php echo $k['id'] ?>" <?php if($product['id_kategori']==$k['id']){echo 'selected';} ?>><?php echo $k['kategori'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="gambar_product">Gambar Product</label>
              <input type="file" class="form-control" id="gambar_product" name="gambar_product">
              <input type="hidden" class="form-control" id="old_image" name="old_image" value="<?php echo $product['gambar_product'] ?>">
            </div>
            <div class="form-group">
              <label for="harga">Harga</label>
              <input type="text" class="form-control" id="harga" name="harga" value="<?php echo $product['harga'] ?>">
              <?php echo form_error('harga', '<small class="text-danger">', '</small>' ) ?>
            </div>
            <div class="form-group">
              <label for="weight">Berat</label>
              <input type="text" class="form-control" id="weight" name="weight" value="<?php echo $product['weight'] ?>">
              <?php echo form_error('weight', '<small class="text-danger">', '</small>' ) ?>
            </div>
            <div class="form-group">
              <label for="stock">Stock</label>
              <input type="text" class="form-control" id="stock" name="stock" value="<?php echo $product['stock'] ?>">
              <?php echo form_error('stock', '<small class="text-danger">', '</small>' ) ?>
            </div>
            <div class="form-group">
              <label for="deskripsi">Deskripsi Product</label>
              <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="deskripsi form-control" placeholder="Tuliskan Deskripsi Product"><?php echo $product['deskripsi'] ?>"
              </textarea>
              <?php echo form_error('deskripsi', '<small class="text-danger">', '</small>' ) ?>
            </div>
<!--             <div class="form-group">
              <label for="url">URL</label>
              <input type="text" class="form-control" id="url" name="url" value="<?php echo $product['url'] ?>">
              <?php echo form_error('url', '<small class="text-danger">', '</small>' ) ?>
            </div> -->
      			<div class="form-group">
      				<label for="modified_by">Modified by</label>
      				<input type="text" id="modified_by" name="modified_by" class="form-control" autocomplete="off" readonly="" value="<?php echo $user['nama'] ?>">
      			</div> 
      			<div class="form-group">
      				<?php date_default_timezone_set('Asia/Jakarta') ?>
      				<input type="text" class="form-control" name="last_modified" id="last_modified" value="<?php echo date('Y-m-d H:i:s') ?>" readonly>                      
      			</div>
            <button type="submit" class="btn btn-sm btn-primary mr-2" name="submit">Submit</button>
            <a href="<?= base_url('product') ?>" class="btn btn-sm btn-dark">Cancel</a>
          </form>
        </div>
      </div>
    </div>
    <div class="col-lg-4 grid-margin stretch-card col-sm-">
      <div class="card">
        <div class="card-body">
          <img src="<?php echo base_url(). '/upload/product/'. $product['gambar_product'] ?>" alt="" class="img-xs img-thumbnail" style="width: 350px;height: 450px;">
        </div>
      </div>
    </div>
</div>

