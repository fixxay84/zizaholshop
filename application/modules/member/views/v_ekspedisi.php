  <!--Main layout-->
  <main class="mt-5 pt-4">
    <div class="container wow fadeIn">
      <h2 class="my-5 h2 text-center">Pilih Ekspedisi</h2>
         
      <div class="row justify-content-center">
        <div class="col-md-8 mb-4">
          <?php if($this->session->flashdata('message')){ ?>
              <?php echo $this->session->flashdata('message'); ?>
          <?php } ?>
          <form action="<?php echo base_url('member/check_shipping_cost') ?>" method="post">
            <div class="card">
                <div class="row">
                  <div class="col card-body">

                    <div class="mb-4">
                      <h6>Berat : <?php echo $total_berat. ' Gram' ?></h6>
                      <input type="hidden" name="total_berat" value="<?php echo $total_berat ?>">
                    </div>

                    <div class="mb-4">
                      <h6>Pilih Kurir : </h6>
                        <div class="md-form m-0">
                          <select id="courier" name="courier" class="form-control">
                            <option value="jne">Jalur Nugraha Ekakurir (JNE)</option>
                            <option value="pos">POS Indonesia</option>
                            <option value="tiki">Titipan Kilat (TIKI)</option>
                          </select>
                        </div>
                    </div>

                    <div class="mb-4">
                      <h6>Lokasi Asal : </h6>
                      <div class="md-form m-0">
                        <select id="origin_province" name="origin_province" class="form-control">
                          <?php foreach($province->rajaongkir->results as $row): ?>
                            <option value="<?php echo $row->province_id ?>"><?php echo $row->province ?></option>
                          <?php endforeach; ?>
                        </select>
                        <select id="origin_city" name="origin_city" class="form-control">
                          <option value=""> - Kota - </option>
                        </select>
                      </div>
                    </div>
                    
                    <div class="mb-4">
                      <h6>Lokasi Tujuan : </h6>
                      <div class="md-form m-0">
                        <select id="destination_province" name="destination_province" class="form-control">
                          <?php foreach($province->rajaongkir->results as $row): ?>
                            <option value="<?php echo $row->province_id ?>"><?php echo $row->province ?></option>
                          <?php endforeach; ?>
                        </select>
                        <select id="destination_city" name="destination_city" class="form-control">
                          <option value=""> - Kota - </option>
                        </select>
                      </div>
                    </div>

                    <div class="md-form">
                      <button class="btn btn-block btn-primary" name="cek_ongkir_submit" type="submit" value="Check Ongkir">
                        Check Ongkir
                      </button>
                    </div>

                  </div>              
                </div>
            </div>
          </form>
        </div>
      </div>
        

    </div>
  </div>
</main>
  <!--Main layout-->


<script>
// menampilkan kota asal pengiriman
  $(document).ready(function(){
    $('#origin_province').change(function(){
 
      var province_id=$('#origin_province').val();
      $.get('<?php echo site_url('member/get_city_by_province/') ?>'+province_id, function(resp){
        // console.log(resp);
        $('#origin_city').html(resp);
      });
    });
  });


  // menampilkan kota tujuan pengiriman
  $(document).ready(function(){
    $('#destination_province').change(function(){
 
      var province_id=$('#destination_province').val();
      $.get('<?php echo site_url('member/get_city_by_province/') ?>'+province_id, function(resp){
        // console.log(resp);
        $('#destination_city').html(resp);
      });
    });
  });
</script>