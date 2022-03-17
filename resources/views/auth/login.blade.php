@include('layouts.landing-page.header')

<!-- Page info section -->
<section class="page-info-section">
  <div class="container">
    <h2>{{$title}}</h2>
    <div class="site-beradcamb">
      <a href="">Auth</a>
      <span><i class="fa fa-angle-right"></i> {{$title}}</span>
    </div>
  </div>
</section>
<!-- Page info end -->



<!-- Contact section -->
<section class="contact-page spad">
  <div class="container">
    <div class="row">
      <div class="col-lg-7">
        <form class="contact-form" method="post" action="{{ route('login') }}">
          @csrf
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <input class="check-form" type="email" name="email" placeholder="Email">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <input class="check-form" type="password" name="password" placeholder="Password">
              </div>
            </div>

            <div class="col-md-12">
              <button class="site-btn sb-gradients mt-4 mb-4" type="submit">Masuk Sekarang</button><br>
              <h5>Belum punya akun ? <a href="{{ route('register') }}">Daftar</a></h5>
            </div>

          </div>
        </form>
      </div>
      <div class="col-lg-5 mt-5 mt-lg-0">
        <img src="/landing-page-assets/img/{{$tentang_kami->gambar_utama}}" alt="Images">
      </div>
    </div>
  </div>
</section>
<!-- Contact section end -->

@include('layouts.landing-page.footer')