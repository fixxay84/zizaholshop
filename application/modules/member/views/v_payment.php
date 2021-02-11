  <!--Main layout-->
  <main class="mt-5 pt-4">
    <div class="container wow fadeIn">

      <!-- Heading -->
      <h2 class="my-5 h2 text-center">Checkout form</h2>

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
        <div class="col-md-8 mb-4">
 
          <!-- Heading -->
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Keranjang Belanja Anda</span>
            <span class="badge badge-secondary badge-pill"><?php echo count($cart); ?></span>
          </h4>

        <form action="<?php echo base_url('member/finish') ?>" method="post" id="payment-form">
        <table class="table table-responsive table-hover" style="width: 100%;">
          <tr>
            <th>No.</th>
            <th class="w-25">Gambar</th>
            <th class="w-25">Produk</th>
            <th class="w-25">Harga</th>
            <th class="text-center">Qty</th>
            <th class="text-right w-25">SubTotal</th>
          </tr>
          <?php $i=1; ?>
          <?php foreach($cart as $item): ?>
          <tr>
            <td><?php echo $i ?></td>
            <input type="hidden" value="<?php echo $item['id'] ?>" name="id">
            <td><img src="<?php echo base_url('upload/product/'. $item['gambar_product']) ?>" width="70"></td>
            <input type="hidden" id="gambar_product" name="gambar_product" value="<?php echo $item['gambar_product'] ?>">
            <td><?php echo $item['name'] ?><input type="hidden" id="name" name="name" value="<?php echo $item['name']?>"></td>
            <td><?php echo 'Rp. '.number_format($item['price'], 0, '','.')?><input type="hidden" id="price" name="price" value="<?php echo $item['price'] ?>"></td>
            <td><?php echo $item['qty'] ?><input type="hidden" id="qty" name="qty" value="<?php echo $item['qty'] ?>"></td>
            <td class="text-right"><?php echo 'Rp. '.number_format($item['subtotal'], 0, '','.') ?><input type="hidden" id="subtotal" name="subtotal" value="<?php echo $item['subtotal']?>">
            </td>
            <input type="hidden" name="result-type" id="result-type" value="" class="result-type"></div>
            <input type="hidden" name="result_data" id="result-data" value="" class="result-data"></div>
          </tr>
          <?php $i++ ?>
          <?php endforeach; ?>
        </table>
        <?php
        if(empty($cart)){
          $ongkir = 0;
        }else{
          $ongkir = $biaya_total_berat;
          $this->session->set_userdata('ongkir', $ongkir);
        }

        $total = $this->cart->total();
        $grandtotal = $total + $ongkir;
        echo "<span class='text-left' style='font-size:25px;'>Total : </span><span class='float-right' style='font-size:25px;'>Rp. ".number_format($total, 0, '','.')."</span></br>";
        echo "<span class='text-left' style='font-size:25px;'>Ekspedisi / Kg : </span><span class='float-right' style='font-size:25px;'>Rp. ".number_format($ongkir, 0, '','.')."</span></br>";
        echo "<span class='text-left' style='font-size:25px;'>Total : </span><span class='float-right' style='font-size:25px;'>Rp. ".number_format($grandtotal, 0, '','.')."</span>";
         ?>
         <input type="hidden" name="ongkir" value="<?php echo $ongkir ?>">
         <?php if($grandtotal == 0): ?>
          <button class="btn btn-primary btn-lg btn-block" type="submit" id="pay-button" disabled="">Bayar Sekarang</button>
          <?php else: ?>
          <button class="btn btn-primary btn-lg btn-block" type="submit" id="pay-button">Bayar Sekarang</button>
         <?php endif; ?>

        </form>
      </div>
        
        <!--Grid column-->

      </div>

      <!--Grid row-->

    </div>
  </main>
  <!--Main layout-->


<!-- midtrans -->
  <script type="text/javascript">
  
    $('#pay-button').click(function (event) {
      event.preventDefault();
      $(this).attr("disabled", "disabled");
    
    $.ajax({
      url: '<?=site_url()?>/member/token',
      cache: false,

      success: function(data) {
        //location = data;

        console.log('token = '+data);
        
        var resultType = document.getElementsByClassName('result-type');
        var resultData = document.getElementsByClassName('result-data');

        function changeResult(type,data){
          $(".result-type").val(type);
          $(".result-data").val(JSON.stringify(data));
          //resultType.innerHTML = type;
          //resultData.innerHTML = JSON.stringify(data);
        }

        snap.pay(data, {
          
          onSuccess: function(result){
            changeResult('success', result);
            console.log(result.status_message);
            console.log(result);
            $("#payment-form").submit();
          },
          onPending: function(result){
            changeResult('pending', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          },
          onError: function(result){
            changeResult('error', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          }
        });
      }
    });
  });

  </script>