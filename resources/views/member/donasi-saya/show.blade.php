@include('layouts.landing-page.header')

<!-- Page info section -->
<section class="page-info-section">
  <div class="container">
    <h2>{{$title}}</h2>
    <div class="site-beradcamb">
      <a href="/">Donasi</a>
      <a href="{{ route('donasi-saya.index') }}"><i class="fa fa-angle-right"></i> Donasi Saya</a>
      <span><i class="fa fa-angle-right"></i> {{$title}}</span>
    </div>
  </div>
</section>
<!-- Page info end -->

<!-- Blog section -->
<section class="single-blog-page spad">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="widget-area">
          <div class="widget">
            <h3 class="widget-title">Detail Donasi</h3>

            <h3>
              <p class="mb-0">ID Donasi : <b>{{$donasi->order_id}}</b></p>
            </h3>

            <h3>
              <p class="mb-0">Tujuan Pembayaran</p>
            </h3>
            <h5 class="mt-0">{{$donasi->program_donasi->judul}}</h5>
            <h3 class="mt-2">
              <p class="mb-0">Donasi Oleh </p>
            </h3>
            <h5 class="mt-0">{{$donasi->user->nama_lengkap}}</h5>
            <h5 class="mt-0">{{$donasi->user->email}}</h5>

            <h3 class="mt-2">
              <p class="mb-0">Jumlah Donasi </p>
            </h3>
            <h4 class="mt-0"><b>{{rupiah($donasi->gross_amount)}}</b></h4>
          </div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="widget-area">
          <div class="widget">
            <h3 class="widget-title">Metode Pembayaran</h3>

            <!-- Indomaret -->
            @if($donasi->payment_type == 'cstore')
            <h3>
              <p class="mb-0">Jenis Pembayaran</p>
            </h3>
            <h5 class="mt-0">{{$status_transaksi['store']}}</h5>

            <h3>
              <p class="mb-0">Status Pembayaran</p>
            </h3>
            <h5 class="mt-0">{{$status_transaksi['transaction_status']}}</h5>

            @if($status_transaksi['transaction_status'] == 'settlement')
            <h3>
              <p class="mb-0">Waktu Pembayaran</p>
            </h3>
            <h5 class="mt-0">{{$donasi->updated_at}}</h5>
            @endif

            <h3 class="mt-2">
              <p class="mb-0">Kode Pembayaran </p>
            </h3>
            <h5 class="mt-0">{{$status_transaksi['payment_code']}}</h5>
            <!-- End Indomaret -->

            @elseif($donasi->payment_type == 'bank_transfer' && isset($status_transaksi['permata_va_number']) )
            <h3>
              <p class="mb-0">Jenis Pembayaran</p>
            </h3>
            <h5 class="mt-0">Permata Virtual Account</h5>

            <h3>
              <p class="mb-0">Status Pembayaran</p>
            </h3>
            <h5 class="mt-0">{{$status_transaksi['transaction_status']}}</h5>

            @if($status_transaksi['transaction_status'] == 'settlement')
            <h3>
              <p class="mb-0">Waktu Pembayaran</p>
            </h3>
            <h5 class="mt-0">{{$donasi->updated_at}}</h5>
            @endif

            <h3 class="mt-2">
              <p class="mb-0">Virtual Account </p>
            </h3>
            <h5 class="mt-0">{{$status_transaksi['permata_va_number']}}</h5>

            @elseif($donasi->payment_type == 'bank_transfer' && isset($status_transaksi['va_numbers']))
            <!-- Bank Transfer BNI, BRI, BCA -->
            <h3>
              <p class="mb-0">Jenis Pembayaran</p>
            </h3>
            <h5 class="mt-0">{{$status_transaksi['va_numbers'][0]['bank']}} Virtual Account</h5>

            <h3>
              <p class="mb-0">Status Pembayaran</p>
            </h3>
            <h5 class="mt-0">{{$status_transaksi['transaction_status']}}</h5>


            @if($status_transaksi['transaction_status'] == 'settlement')
            <h3>
              <p class="mb-0">Waktu Pembayaran</p>
            </h3>
            <h5 class="mt-0">{{$donasi->updated_at}}</h5>
            @endif

            <h3 class="mt-2">
              <p class="mb-0">Virtual Account </p>
            </h3>
            <h5 class="mt-0">{{$status_transaksi['va_numbers'][0]['va_number']}}</h5>

            <!-- End Bank Transfer BNI, BRI, BCA -->

            @elseif($donasi->payment_type == 'echannel')
            <!-- Bank Mandiri  -->
            <h3>
              <p class="mb-0">Jenis Pembayaran</p>
            </h3>
            <h5 class="mt-0">Mandiri Bill Payment</h5>

            <h3>
              <p class="mb-0">Status Pembayaran</p>
            </h3>
            <h5 class="mt-0">{{$status_transaksi['transaction_status']}}</h5>


            @if($status_transaksi['transaction_status'] == 'settlement')
            <h3>
              <p class="mb-0">Waktu Pembayaran</p>
            </h3>
            <h5 class="mt-0">{{$donasi->updated_at}}</h5>
            @endif

            <h3 class="mt-2">
              <p class="mb-0">Biller Code </p>
            </h3>
            <h5 class="mt-0">{{$status_transaksi['biller_code']}}</h5>
            <h3 class="mt-2">
              <p class="mb-0">Bill Key </p>
            </h3>
            <h5 class="mt-0">{{$status_transaksi['bill_key']}}</h5>

            <!-- End Bank Mandiri  -->

            <!-- Permata VA -->
            @endif
          </div>

          @if($status_transaksi['transaction_status'] != 'settlement')
          <button class="site-btn sb-gradients btn-block mt-2" id="pay-button">Ganti Metode Pembayaran</button>
          @endif
        </div>
      </div>
    </div>
  </div>
  </div>
</section>
<!-- Blog section end -->


<!-- Form Submit -->
<form action="{{ route('payment.update', $donasi->id) }}" id="submit_form" method="post">
  {{ method_field('PATCH') }}
  @csrf
  <input type="hidden" name="donasi_id" value="{{$params['item_details'][0]['id']}}">
  <input type="hidden" name="json" id="json_callback">
</form>


<script type="text/javascript">
  // For example trigger on button clicked, or any time you need
  var payButton = document.getElementById('pay-button');
  payButton.addEventListener('click', function() {
    // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
    window.snap.pay('{{$snapToken}}', {
      onSuccess: function(result) {
        /* You may add your own implementation here */
        // alert("payment success!");
        console.log(result);
        send_response_to_form(result);
      },
      onPending: function(result) {
        /* You may add your own implementation here */
        // alert("wating your payment!");
        console.log(result);
        send_response_to_form(result);
      },
      onError: function(result) {
        /* You may add your own implementation here */
        // alert("payment failed!");
        console.log(result);
        send_response_to_form(result);
      },
      onClose: function() {
        /* You may add your own implementation here */
        alert('you closed the popup without finishing the payment');
      }
    })
  });

  // Mengirimkan Data Ke Form 
  function send_response_to_form(result) {
    document.getElementById('json_callback').value = JSON.stringify(result);
    $('#submit_form').submit();
  }
</script>

@include('layouts.landing-page.footer')