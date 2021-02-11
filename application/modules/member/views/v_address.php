  <!--Main layout-->
  <main class="mt-5 pt-4">
    <div class="container wow fadeIn">

      <!-- Heading -->
      <h2 class="my-5 h2 text-center">Tujuan Pengiriman</h2>

      <div class="row">
        <div class="col-md-12">
          <?php 
          if($this->session->flashdata('message')){
            echo $this->session->flashdata('message');
          }
        ?>
        </div>
      </div>

      <!--Grid row-->
      <div class="row justify-content-center">
        <!--Grid column-->
        <div class="col-md-7 mb-4">
          <!--Card-->
          <div class="card">

            <!--Card content-->
            <form class="card-body" method="post" action="<?php echo base_url('member/alamatpengiriman/'. $member['id']) ?>">

              <!--Grid row-->
              <div class="row">

                <!--Grid column-->
                <div class="col-md-12">

                  <!--firstName-->
                  <div class="md-form mb-2">
                    <div class="row">
                      <div class="col">
                        <input type="hidden" name="id" value="<?php echo $member['id'] ?>">
                        <input type="text" id="firstName" class="form-control" name="nama_depan" value="<?php echo ucfirst($member['nama_depan']) ?>">
                        <?php echo form_error('nama_depan', '<small class="text-danger">', '</small>' ) ?>
                      </div>
                    <div class="col">
                      <input type="text" id="lastname" class="form-control" name="nama_belakang" value="<?php echo ucfirst($member['nama_belakang']) ?>">
                    </div>
                    </div>
                  </div>

                  <div class="md-form mb-2">
                    <input type="text" id="email" class="form-control" placeholder="Alamat Email" value="<?php echo $member['email'] ?>" readonly="">
                    <label for="email" class="">Email (optional)</label>
                  </div>

                  <div class="md-form mb-5">
                    <input type="number" id="telp" class="form-control" name="telp" value="<?php echo $member['telp'] ?>">
                    <?php echo form_error('telp', '<small class="text-danger">', '</small>' ) ?>
                    <label for="telp">Nomor Telephone</label>
                  </div>
                  <div class="md-form">
                    <p for="alamat">Alamat Pengiriman : </p>
                    <textarea type="text" class="form-control p-2" id="alamat" rows="5" name="alamat"><?php echo $member['alamat'] ?>
                    </textarea>
                    <?php echo form_error('alamat', '<small class="text-danger">', '</small>' ) ?>
                  </div>
                  <div>
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
                  </div>

                </div>
                <!--Grid column-->

              </div>
            
            </form>

          </div>
          <!--/.Card-->


        </div>
        <!--Grid column-->

      </div>

      <!--Grid row-->

    </div>
  </main>
  <!--Main layout-->