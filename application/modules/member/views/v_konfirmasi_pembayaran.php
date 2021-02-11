  <!--Main layout-->
  <main class="mt-5 pt-4">
    <div class="container wow fadeIn">

      <!-- Heading -->
      <h2 class="my-5 h2 text-center">Konfirmasi Pembayaran</h2>
      <!--Grid row-->
      <div class="row justify-content-center">

        <!--Grid column-->
        <div class="col-md-6 mb-4">
        <form action="<?php echo base_url('member/aksiKonfirmasiPembayaran') ?>" method="post">
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama">
            <?php echo form_error('nama', '<small class="text-danger">', '</small>' ) ?>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email">
            <?php echo form_error('email', '<small class="text-danger">', '</small>' ) ?>
          </div>
          <div class="form-group">
            <label for="date">Tanggal Pembayaran</label>
            <input type="text" class="form-control date" id="date" name="date" value="<?php $date = new DateTime(); echo $date->format('Y-m-d')?>">
            <?php echo form_error('date', '<small class="text-danger">', '</small>' ) ?>
          </div>
          <div class="form-group">
            <label for="jumlah">Jumlah Pembayaran</label>
            <input type="text" class="form-control" id="jumlah" name="jumlah">
            <?php echo form_error('jumlah', '<small class="text-danger">', '</small>' ) ?>
          </div>
          <div class="form-group">
            <label for="nama_pengirim">Nama Rekening Pengirim</label>
            <input type="text" class="form-control" id="nama_pengirim" name="nama_pengirim">
            <?php echo form_error('nama_pengirim', '<small class="text-danger">', '</small>' ) ?>
          </div>
          <div class="form-group">
            <label for="order_id">Order ID</label>
            <input type="text" class="form-control" id="order_id" name="order_id" value="<?php echo rand() ?>">
          </div>
          <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <input type="text" class="form-control" id="keterangan" name="keterangan">
          </div>
          <div class="form-group">
            <label for="image">Upload Struk Transfer</label>
            <input type="file" class="form-control" id="image" name="image">
          </div>
          <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit" name="submit">Kirim</button>
          </div>
        </form>
        
        <!--Grid column-->

      </div>

      <!--Grid row-->

    </div>
  </main>
  <!--Main layout-->
  <script>
      $(document).ready(function () {
          $(".date").datepicker({
              format: 'yyyy/mm/dd',
              autoclose:true
          });
      });
  </script>