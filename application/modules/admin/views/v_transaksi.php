<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin') ?>">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Transaksi</li>
  </ol>
</nav>

<!-- Session Message -->
<div class="row">
  <div class="col-lg-9">
    <?php 
      if($this->session->flashdata('message')){
        echo $this->session->flashdata('message');
      }
    ?>
  </div>
</div>

<div class="row">
  <div class="col-lg-9 grid-margin stretch-card">
      <div class="card">
        <div class="card-body" style="font-size: 12px;">
          <div class="table-responsive">
            <table class="display responsive table-hover" id="demo" cellpadding="5" width="100%">
              <thead>
                <tr>
        					<th>No.</th>
                  <th class="text-center">Order ID</th>
        					<th class="text-center">Email</th>
                  <th class="text-center">Total</th>
                  <th class="text-center">Time</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
              <?php $i = 1; ?>
              <?php foreach($transaksi as $trx): ?>
                <tr>
                  <td class="text-center"><?php echo $i; ?></td>
                  <td class="text-center">
                    <a href="<?php echo base_url('admin/status/'. $trx->order_id) ?>"><span class="badge badge-info"><?php echo $trx->order_id ?></span></a>
                  </td>
                  <td class="text-center"><?php echo $trx->email ?></td>
                  <td class="text-center"><?php echo $trx->total ?></td>
                  <td class="text-center"><?php echo $trx->time ?></td>
                  <td class="text-center">
                      <a href="#" onclick="return confirm('Yakin ingin dihapus?')" class="btn btn-outline btn-icons btn-warning btn-rounded">
                        <i class="mdi mdi-cancel"></i>
                      </a>
                      <a href="#" onclick="return confirm('Yakin ingin dihapus?')" class="btn btn-outline btn-icons btn-danger btn-rounded">
                        <i class="mdi mdi-timer"></i>
                      </a>  
                  </td>
                </tr>
                <?php $i++; ?>
              <?php endforeach; ?>
              </tbody>
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
      scroller:true,
      pageLength: 5
  });
});
</script>