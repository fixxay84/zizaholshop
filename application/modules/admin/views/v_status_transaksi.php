<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/transaksi') ?>">Transaksi</a></li>
    <li class="breadcrumb-item active" aria-current="page">Status Transaksi</li>
  </ol>
</nav>
<?php 

  if($this->session->flashdata('message')){
    echo $this->session->flashdata('message');
  }

?>
<div class="row">
  <div class="col-lg-8 grid-margin stretch-card">
      <div class="card">
        <div class="card-body" style="font-size: 12px;">
          <div class="table-responsive">
            <table class="table table-responsive table-hover" style="width: 100%;">
              <tr>
                <th>ID Order</th>
                <th>Status Transaksi</th>
                <th>Total</th>
                <th>Metode Pembayaran</th>
                <th>Waktu Transaksi</th>
                <th>Resi</th>
              </tr>
              <tr>
                <td><?php echo $stt->order_id ?></td>
                <?php if($stt->transaction_status=='cancel'): ?>
                <td class="text-center"><span class="badge badge-danger"><?php echo $stt->transaction_status ?></span></td>
                <?php else: ?>
                <td><span class="badge badge-success"><?php echo $stt->transaction_status ?></span></td>
                <?php endif; ?>
                <td><?php echo 'Rp. '.number_format($stt->gross_amount, 0, '','.') ?></td>
                <?php if($stt->payment_type=='echannel'): ?>
                <td class="text-center"><?php echo 'No Payment' ?></td>
                <?php else: ?>
                <td><?php echo $stt->payment_type ?></td>
                <?php endif; ?>
                <td><?php echo $stt->transaction_time ?></td>
                <td><?php echo $orders['resi'] ?></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
<script>
$(document).ready(function(){
  $('#demo').DataTable({
      scrollX: true,
      scrollY:"500px",
      scrollCollapse: true,
      scroller:true
  });
});
</script>