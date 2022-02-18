@include('layouts.landing-page.header')

<!-- Page info section -->
<section class="page-info-section">
  <div class="container">
    <h2>{{$title}}</h2>
    <div class="site-beradcamb">
      <a href="/">Donasi</a>
      <a href="{{ route('home.show', $program_donasi->id) }}"><i class="fa fa-angle-right"></i> Detail Program</a>
      <span><i class="fa fa-angle-right"></i> {{$title}}</span>
    </div>
  </div>
</section>
<!-- Page info end -->

<!-- Blog section -->
<section class="single-blog-page spad">
  <div class="container">
    <div class="widget-area">
      <div class="widget">
        <h3 class="widget-title">Detail Donasi</h3>

        <h3>
          <p class="mb-0">ID Donasi : <b>{{$params['transaction_details']['order_id']}}</b></p>
          <p class="mt-0">Status : <b>Pending</b></p>
        </h3>

        <h3>
          <p class="mb-0">Tujuan Pembayaran</p>
        </h3>
        <h5 class="mt-0">{{$params['item_details'][0]['name']}}</h5>

        <h3 class="mt-2">
          <p class="mb-0">Donasi Oleh </p>
        </h3>
        <h5 class="mt-0">{{$params['customer_details']['first_name']}}</h5>
        <h5 class="mt-0">{{$params['customer_details']['email']}}</h5>

        <h3 class="mt-2">
          <p class="mb-0">Jumlah Donasi </p>
        </h3>
        <h4 class="mt-0"><b>{{rupiah($params['transaction_details']['gross_amount'])}}</b></h4>
      </div>
      <button class="site-btn sb-gradients btn-block mt-2" id="pay-button">Bayar Sekarang</button>
    </div>
  </div>
  </div>
</section>
<!-- Blog section end -->

<!-- Form Submit -->
<form action="{{ route('payment.store') }}" id="submit_form" method="post">
  @csrf
  <input type="hidden" name="doa" value="{{$doa}}">
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