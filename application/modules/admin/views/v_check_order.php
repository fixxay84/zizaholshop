<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin') ?>">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Input Resi</li>
  </ol>
</nav>
<div class="row">
  <div class="col-lg-6 grid-margin stretch-card">
	<?php 

	  if($this->session->flashdata('message')){
	    echo $this->session->flashdata('message');
	  }

	?>
      <div class="card">
        <div class="card-body p-5" style="font-size: 12px;">
			<form action="<?php echo base_url('admin/updateResi') ?>" method="post">
				<div class="row">
					<div class="col-md-12">
						<label for="order_id">Order Id :</label>
						<input value="" size="10" type="text" name="order_id" autocomplete="off" class="form-control" autofocus="" / id="order_id">
		                <?php echo form_error('order_id', '<small class="text-danger">', '</small>' ) ?><br><br>
						<label for="resi">Input No.Resi :</label>
						<input value="" size="10" type="text" name="resi" autocomplete="off" class="form-control" autofocus="" / id="resi">
		                <?php echo form_error('resi', '<small class="text-danger">', '</small>' ) ?><br><br>
							<button class="btn btn-primary btn-block" type="submit">Submit Resi</button>
						</p>
					</div>
				</div>
			</form>
        </div>
      </div>
    </div>
</div>
