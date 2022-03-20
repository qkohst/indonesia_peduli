@include('layouts.landing-page.header')

<section class="page-info-section">
  <div class="container">
    <h2>{{$title}}</h2>
    <div class="site-beradcamb">
      <a href="/">Donasi</a>
      <span><i class="fa fa-angle-right"></i> {{$title}}</span>
    </div>
  </div>
</section>
<!-- Page info end -->

<!-- Blog section -->
<section class="single-blog-page spad">
  <div class="container">

    <h4>{{$data_donasi->count()}} Donasi</h4>

    <ul class="comment-list">
      @if($data_donasi->count() == 0)
      <p>Belum ditemukan data donasi</p>
      @else
      @foreach($data_donasi as $donasi)
      <li>
        <div class="comment">
          <div class="comment-avator set-bg" data-setbg="/gambar-program-donasi/{{$donasi->program_donasi->gambar}}"></div>
          <div class="comment-content">
            <h5>{{$donasi->program_donasi->judul}}<span>, {{$donasi->created_at}}</span></h5>
            <h3>
              <p class="mt-0">Status Pembayaran : <b>{{$donasi->transaction_status}}</b></p>
            </h3>
            <h5>Jumlah Donasi <b>{{rupiah($donasi->gross_amount)}}</b></h5>
            <p>{{$donasi->doa}}</p>

            <a href="{{ route('donasi-saya.show', $donasi->id) }}" class="c-btn">Detail</a>
          </div>
        </div>
      </li>
      <hr>
      @endforeach
      @endif

    </ul>
  </div>
  </div>
</section>
<!-- Blog section end -->

@include('layouts.landing-page.footer')