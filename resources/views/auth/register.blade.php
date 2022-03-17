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
        <form class="contact-form" method="post" action="{{ route('register') }}">
          @csrf
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <input class="check-form" type="text" name="nama_lengkap" placeholder="Nama Lengkap" value="{{old('nama_lengkap')}}">
              </div>
            </div>
            <div class="col-md-12 mb-2">
              <h5 class="mb-3">Jenis Kelamin</h5>
              <div class="contact-type">
                <label class="ct-label">Laki-Laki
                  <input type="radio" name="jenis_kelamin" value="L" @if (old('jenis_kelamin')=='L' ) checked @endif>
                  <span class="checkmark"></span>
                </label>
                <label class="ct-label">Perempuan
                  <input type="radio" name="jenis_kelamin" value="P" @if (old('jenis_kelamin')=='P' ) checked @endif>
                  <span class="checkmark"></span>
                </label>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <input class="check-form" type="number" name="nomor_hp" placeholder="Nomor HP" value="{{old('nomor_hp')}}">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <input class="check-form" type="email" name="email" placeholder="Email" value="{{old('email')}}">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <input class="check-form" type="password" name="password" placeholder="Password">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <input class="check-form" type="password" name="konfirmasi_password" placeholder="Konfirmasi Password">
              </div>
            </div>

            <div class="col-md-12">
              <button class="site-btn sb-gradients mt-4 mb-4" type="submit">Daftar Sekarang</button>
              <h5>Sudah punya akun ? <a href="{{ route('login') }}">Masuk</a></h5>
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