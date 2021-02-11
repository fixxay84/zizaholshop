  <!--Main layout-->
  <main class="mt-5 pt-5 pb-2">
    <div class="container wow fadeIn mt-5 mb-4">

      <!-- Heading -->
      <h2 class="my-5 h2 text-center">Transaksi</h2>
      <div class="row justify-content-center">
        <div class="col-md-7 mb-5">
        <?php if($this->session->flashdata('message')){ ?>
            <?php echo $this->session->flashdata('message'); ?>
        <?php } ?>
          <!-- Heading -->
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Pilih ID Order</span>
          </h4>
        <table class="table table-responsive table-hover" style="width: 100%;">
          <tr>
            <th>No</th>
            <th>ID Order</th>
            <th>Email</th>
            <th>Total</th>
            <th>Waktu Transaksi</th>
            <th>Cancel</th>

          </tr>
          <?php $i=1; ?>
          <?php foreach($order as $o): ?>
          <tr>
            <td><?php echo $i ?></td>
            <td><a href="<?php echo base_url('member/status/'. $o['order_id']) ?>" class="badge badge-primary p-2"><?php echo $o['order_id'] ?></a></td>
            <td><?php echo $o['email'] ?></td>
            <td class="text-right"><?php echo number_format($o['total']) ?></td>
            <td><?php echo $o['time'] ?></td>
            <td>
              <a href="<?php echo base_url('member/cancel/'. $o['order_id']) ?>" onclick="return confirm('Yakin ingin dicancel?')" class="btn btn-sm btn-danger">
               <i class="fa fa-times"></i>
              </a></td>
          </tr>
          <?php $i++; ?>
         <?php endforeach; ?>
        </table>
        <a href="<?php echo base_url('member') ?>" class="btn btn-info btn-block">Back to Home</a>

        </div>
      </div>



    </div>
  </main>
  <!--Main layout-->
