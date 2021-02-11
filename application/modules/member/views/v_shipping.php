  <!--Main layout-->
  <main class="mt-5 pt-4">
    <div class="container wow fadeIn">
      <h2 class="my-5 h2 text-center">Shipping</h2>
         
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="row">
              <div class="col card-body">
                <table class="table">
                  <thead>
                      <tr>
                        <th scope="col">Ekspedisi</th>
                        <th scope="col">Kota Asal</th>
                        <th scope="col">Kota Tujuan</th>
                        <th scope="col">Berat (Gram)</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if($this->session->userdata('shipping_cost')): ?>
                      <tr>
                        <?php foreach($this->session->userdata('shipping_cost')->rajaongkir->results as $results):?>
                          <td><?php echo $results->name ?></td>
                        <?php endforeach; ?>
                          <td><?php echo $shipping_cost->rajaongkir->origin_details->city_name ?></td>
                          <td><?php echo $shipping_cost->rajaongkir->destination_details->city_name ?></td>
                          <td><?php echo $shipping_cost->rajaongkir->query->weight ?></td>
                      </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
              </div>
            </div>
          </div>

          <form action="<?php echo base_url('member/payment') ?>" method="post">
          <div class="card mt-2 mb-2">
              <div class="row">
                <div class="col card-body">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">Pilih</th>
                        <th scope="col">Service</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Biaya</th>
                        <th scope="col">ETD (hari)</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php if($shipping_cost): ?>
                     <?php foreach($shipping_cost->rajaongkir->results as $results): ?>
                      <?php foreach($results->costs as $costs): ?>
                        <tr>
                          <?php foreach($costs->cost as $cost): ?>
                            <td>
                              <input type="radio" name="biaya_total_berat" value="<?php echo $cost->value; ?>">
                            </td>
                          <?php endforeach; ?>
                          <td><?php echo $costs->service ?></td>
                          <td><?php echo $costs->description ?></td>
                          <?php foreach($costs->cost as $cost): ?>
                            <td>
                              <?php echo $cost->value;?>
                            </td>
                            <td><?php echo $cost->etd ?></td>
                          <?php endforeach; ?>
                        </tr>
                      <?php endforeach; ?>
                     <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                  </table>
                </div>
              </div>
          </div>
          <?php if($this->session->userdata('shipping_cost')): ?>
          <input class="btn btn-block btn-primary" name="ongkir" type="submit" value="Lanjut Pembayaran">
          <?php else: ?>
          <button class="btn btn-block btn-primary" name="ongkir" value="Lanjut Pembayaran" type="submit" disabled="">Lanjut Pembayaran</button>
          <?php endif; ?>
          </form>
          </div>
        </div>
      </div>
  </div>
</main>
  <!--Main layout-->