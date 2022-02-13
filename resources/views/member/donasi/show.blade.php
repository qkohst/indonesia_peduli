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
      <div class="row">
        <div class="col-lg-5">
          <div class="blog-item bi-feature">
            <figure class="blog-thumb">
              <img src="/gambar-program-donasi/{{$program_donasi->gambar}}" alt="">
            </figure>
          </div>
        </div>
        <div class="col-lg-7">
          <h3 class="widget-title">{{$program_donasi->judul}}</h3>
          <h4 class="widget-title">{{$program_donasi->deskripsi}}</h4>
          <p>{!!Str::limit($program_donasi->kisah, 300, $end='...')!!}</p>
        </div>
      </div>
    </div>

    <div class="widget-area">
      <form class="contact-form px-2" action="{{ route('payment.index') }}" method="GET">
        @csrf
        <input type="hidden" name="donasi_id" value="{{$program_donasi->id}}">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <input class="check-form" type="number" name="jumlah_donasi" value="{{old('jumlah_donasi')}}" placeholder="Jumlah Donasi (Rp.)">
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <textarea name="doa" placeholder="Do'a untuk mereka ...">{{old('doa')}}</textarea>
            </div>
          </div>
          <div class="col-md-12">
            <button class="site-btn sb-gradients btn-block mt-2" type="submit">Lanjut Ke Pembayaran</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  </div>
</section>
<!-- Blog section end -->

@include('layouts.landing-page.footer')