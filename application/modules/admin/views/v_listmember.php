<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin') ?>">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">List Member</li>
  </ol>
</nav>
<?php 

  if($this->session->flashdata('message')){
    echo $this->session->flashdata('message');
  }

?>
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
<!--         	<a href="<?php echo base_url('admin/addProduct') ?>">
        		<button class="btn btn-icons btn-rounded btn-primary float-left mb-3 mr-3">
        			<i class="mdi mdi-plus"></i>
        		</button>
        	</a> -->
          <div class="table-responsive">
            <table class="display responsive table-bordered table-hover" id="demo" cellpadding="5" width="100%" style="font-size: 12px;">
              <thead>
                <tr>
        					<th>No.</th>
                  <th>Delete Akun</th>
                  <th class="text-center">Nama Lengkap</th>
        					<th class="text-center">Email</th>
                  <th class="text-center">Telephone</th>
                  <th class="text-center">Alamat</th>
                  <th class="text-center">Status Aktivasi</th>
                </tr>
              </thead>
              <tbody>
              <?php $i = 1; ?>
              <?php foreach($member as $m): ?>
                <tr>
                  <td class="text-center"><?php echo $i; ?></td>
                  <td class="text-center">
                      <a href="<?php echo base_url('admin/deleteMember/'. $m['id']); ?>" onclick="return confirm('Yakin ingin dihapus?')" class="btn btn-outline btn-icons btn-danger btn-rounded">
                        <i class="mdi mdi-delete-forever"></i>
                      </a> 
                  </td>
                  <td><?php echo $m['nama_depan']. ' '. $m['nama_belakang'] ?></td>
                  <td><?php echo $m['email'] ?></td>
                  <td class="text-center"><?php echo $m['telp'] ?></td>
                  <td><?php echo $m['alamat'] ?></td>
                  <td class="text-center">
                    <?php 
                      if ($m['is_active']==1){
                        echo '<span class="badge badge-success">Aktif</span>';
                      } else{
                        echo '<span class="badge badge-danger">Belum Aktif</span>';
                      }
                    ?>
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
      pageLength: 6
  });
});
</script>