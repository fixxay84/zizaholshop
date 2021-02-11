  <!--Main layout-->
  <main class="mt-5 pt-4">
    <div class="container wow fadeIn">

      <!-- Heading -->
      <h2 class="my-5 h2 text-center">Keranjang Belanja</h2>

      <!--Grid row-->
      <div class="row justify-content-center">
        <!--Grid column-->
        <div class="col-md-9 mb-4">
 
          <!-- Heading -->
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Keranjang Belanja Anda</span>
            <span class="badge badge-secondary badge-pill"><?php echo count($cart); ?></span>
          </h4>

        <form action="<?php echo base_url('member/address') ?>" method="post" id="payment-form">
        <table class="table table-responsive table-hover" style="width: 100%;">
          <tr>
            <th>No.</th>
            <th>Gambar</th>
            <th>Produk</th>
            <th class="text-center">Harga</th>
            <th class="text-center">Berat/Pcs</th>
            <th class="text-center">Qty</th>
            <th class="text-center">Sub Berat Ttl</th>
            <th class="text-right w-25 text-center">SubTotal</th>
            <th class="text-center">Delete</th>
          </tr>
          <?php $i=1; ?>
          <?php foreach($cart as $item): ?>
          <tr>
            <td><?php echo $i ?></td>
            <input type="hidden" value="<?php echo $item['id'] ?>" name="id">
            <td>
              <img src="<?php echo base_url('upload/product/'. $item['gambar_product']) ?>" width="70">
            </td>
            <input type="hidden" id="gambar_product" name="gambar_product" value="<?php echo $item['gambar_product'] ?>">
            <td>
              <?php echo $item['name'] ?>
              <input type="hidden" id="name" name="name" value="<?php echo $item['name']?>">
            </td>
            <td class="text-center"><?php echo 'Rp. '.number_format($item['price'], 0, '','.')?>
              <input type="hidden" id="price" name="price" value="<?php echo $item['price'] ?>">
            </td>
            <td class="text-center"><?php echo $item['weight']?>
              <input type="hidden" id="weight" name="weight" value="<?php echo $item['weight'] ?>"> Gr
            </td>
            <td><?php echo $item['qty'] ?>
              <input type="hidden" id="qty" name="qty" value="<?php echo $item['qty'] ?>"> Pcs
            </td>
            <td class="text-center"><?php echo $item['subberat'] ?>
              <input type="hidden" id="subberat" name="subberat" value="<?php echo $item['subberat'] ?>"> Gr
            </td>
            <td class="text-center"><?php echo 'Rp. '.number_format($item['subtotal'], 0, '','.') ?>
              <input type="hidden" id="subtotal" name="subtotal" value="<?php echo $item['subtotal']?>">
            </td>
            <input type="hidden" name="result-type" id="result-type" value="" class="result-type"></div>
            <input type="hidden" name="result_data" id="result-data" value="" class="result-data"></div>
            <td class="text-center">
              <a href="<?php echo base_url('member/del_cart/'. $item['rowid']) ?>" class="btn btn-sm btn-danger">
                <i class="fa fa-times"></i>
              </a>
            </td>
          </tr>
          <?php $i++ ?>
          <?php endforeach; ?>
        </table>
        <?php
          $total = $this->cart->total();
          echo "<span class='text-left' style='font-size:25px;'>Sub Total : </span><span class='float-right' style='font-size:25px;'>Rp. ".number_format($total, 0, '','.')."</span></br>";
         ?>
        <?php 
          $sub_total_berat = 0;
          foreach($this->cart->contents() as $item){
            $sub_total_berat += $item['subberat'];
          }
        $total_berat = $sub_total_berat;
        echo "<span class='text-left' style='font-size:25px;'>Total Berat : </span><span class='float-right' style='font-size:25px;'>".($total_berat).' Gram'."</span></br>";
        ?>
          <input type="hidden" name="total_berat" value="<?php echo $total_berat; ?>">
          <?php echo $this->session->set_userdata('total_berat', $total_berat) ?>
         <?php if($total == 0): ?>
          <button class="btn btn-primary btn-lg btn-block" type="submit" disabled="">Check Out</button>
          <?php else: ?>
          <button class="btn btn-primary btn-lg btn-block" type="submit" >Check Out</button>
         <?php endif; ?>
        </form>

        <!--Grid column-->

      </div>


      <!--Grid row-->

    </div>
  </main>
  <!--Main layout-->
