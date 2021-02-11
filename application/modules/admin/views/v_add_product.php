<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin') ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/product') ?>">Product</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add New Product</li>
  </ol>
</nav>
<?php 
    echo $this->session->flashdata('message');
?>

<div class="row">
    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <br>
          <form class="forms-sample" action="<?php echo base_url('admin/aksiTambahProduct'); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="merek">Nama Product</label>
              <input type="text" class="form-control text-uppercase" id="nama_product" name="nama_product">
            </div>
            <div class="form-group">
              <label for="Kategori">Jenis Kategori</label>
              <select name="kategori" id="kategori" class="form-control">
                <option value="Pilih Kategori">Pilih Kategori</option>
                <?php foreach($kategori as $k): ?>
                <option value="<?php echo $k['id'] ?>"><?php echo $k['kategori'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="gambar_product">Gambar Product</label>
              <input type="file" class="form-control" id="gambar_product" name="gambar_product">
            </div>
            <div class="form-group">
              <label for="harga">Harga</label>
              <input type="text" class="form-control" id="harga" name="harga" placeholder="Rp.">
            </div>
            <div class="form-group">
              <label for="weight">Berat</label>
              <input type="text" class="form-control" id="weight" name="weight" placeholder="Gram">
            </div>
            <div class="form-group">
              <label for="stock">Stock</label>
              <input type="number" class="form-control" id="stock" name="stock" placeholder="Masukkan Jumlah Stock">
            </div>
            <div class="form-group">
              <label for="deskripsi">Deskripsi Product</label>
              <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="deskripsi form-control" placeholder="Tuliskan Deskripsi Product"></textarea>
            </div>
            <div class="form-group">
              <label for="url">URL Website</label>
              <input type="text" class="form-control" id="url" name="url" placeholder="URL">
            </div>
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
</div>

