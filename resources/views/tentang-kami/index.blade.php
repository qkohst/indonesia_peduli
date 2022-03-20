@include('layouts.landing-page.header')

<section class="page-info-section">
  <div class="container">
    <h2>{{$title}}</h2>
    <div class="site-beradcamb">
      <a href="/">Home</a>
      <span><i class="fa fa-angle-right"></i> {{$title}}</span>
    </div>
  </div>
</section>
<!-- Page info end -->


<!-- About section -->
<section class="about-section spad">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 offset-lg-6 about-text">
        <h2>Tentang Indonesia Peduli</h2>
        <h5>{{$tentang_kami->deksripsi_singkat}}</h5>
        <p>{{$tentang_kami->deksripsi}}</p>
        @if (is_null(Auth::user()))
        <a href="{{ route('register') }}" class="site-btn sb-gradients sbg-line mt-5">Bergabung Sekarang</a>
        @endif
      </div>
    </div>
    <div class="about-img">
      <img src="/landing-page-assets/img/{{$tentang_kami->gambar_utama}}" alt="">
    </div>
  </div>
</section>
<!-- About section end -->

<!-- Features section -->
<section class="features-section spad gradient-bg">
  <div class="container text-white">
    <div class="section-title text-center">
      <h2>Partner Kami</h2>
      <p>Semua institusi, rumah sakit, klinik, perusahaan dan organisasi yang turut bekerja sama untuk Indonesia yang lebih baik</p>
    </div>
    <div class="row">
      <div class="col-12 text-center">
        @foreach($data_partner_kami as $partner)
        <img src="landing-page-assets/img/partner-kami/{{$partner->logo}}" height="65 px" class="mr-2 mb-4">
        @endforeach
      </div>
    </div>
  </div>
</section>
<!-- Features section end -->

<!-- Process section -->
<section class="process-section spad">
  <div class="container">
    <div class="section-title text-center">
      <h2>Bagaimana Cara Kami Bekerja</h2>
    </div>
    <div class="row">

      @foreach($data_cara_kerja as $cara_kerja)
      <div class="col-md-4 process">
        <div class="process-step">
          <figure class="process-icon">
            <img src="landing-page-assets/img/cara-kerja/{{$cara_kerja->icon}}" alt="#" height="65 px">
          </figure>
          <h4>{{$cara_kerja->tahap}}</h4>
          <p>{{$cara_kerja->deskripsi}}</p>
        </div>
      </div>
      @endforeach

    </div>
    <!-- Newsletter section end -->
  </div>
</section>
<!-- Process section end -->

<!-- Newsletter section -->
<section class="newsletter-section gradient-bg">
  <div class="container text-white">
    <div class="row">
      <div class="col-lg-8 newsletter-text">
        <h2>Transparansi Penyaluran Dana</h2>
        <p>Kami mempublikasikan setiap transaksi dan distribusi penyaluran dana.</p>
      </div>
      <div class="col-lg-4 col-md-8 offset-lg-0 offset-md-2">
        <a href="{{ route('home.transparansi') }}" class="site-btn sb-gradients sbg-line btn-block mt-3">Lihat Transparansi</a>
      </div>
    </div>
  </div>
</section>

<!-- Team section -->
<section class="team-section spad">
  <div class="container">
    <div class="section-title text-center">
      <h2>Tim Kami</h2>
      <p>Indonesia Peduli dijalankan oleh para profesional dari berbagai bidang kemahiran.</p>
    </div>
  </div>
  <div class="team-members clearfix">
    <!-- Team member -->
    @foreach($data_anggota_tim as $anggota_tim)
    <div class="member mb-4">
      <div class="member-text">
        <div class="member-img set-bg" data-setbg="landing-page-assets/img/anggota-tim/{{$anggota_tim->foto}}"></div>
        <h2>{{$anggota_tim->nama_lengkap}}</h2>
        <span>{{$anggota_tim->jabatan}}</span>
      </div>
      <div class="member-info">
        <div class="member-img mf set-bg" data-setbg="landing-page-assets/img/anggota-tim/{{$anggota_tim->foto}}"></div>
        <div class="member-meta">
          <h2>{{$anggota_tim->nama_lengkap}}</h2>
          <span>{{$anggota_tim->jabatan}}</span>
        </div>
        <p>{{$anggota_tim->uraian_tugas}}</p>
      </div>
    </div>
    @endforeach
  </div>
</section>
<!-- Team section -->

@include('layouts.landing-page.footer')