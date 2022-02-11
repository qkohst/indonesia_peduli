@include('layouts.landing-page.header')
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
      <form class="contact-form px-2">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <input class="check-form" type="number" placeholder="Jumlah Donasi (Rp.)">
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <textarea placeholder="Do'a untuk mereka ..."></textarea>
            </div>
          </div>
          <div class="col-md-12">
            <button class="site-btn sb-gradients btn-block mt-2">Lanjut Ke Pembayaran</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  </div>
</section>
<!-- Blog section end -->

@include('layouts.landing-page.footer')