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
        <img src="/landing-page-assets/img/partner-kami/{{$partner->logo}}" height="65 px" class="mr-2 mb-4">
        @endforeach
      </div>
    </div>
  </div>
</section>
<!-- Features section end -->

<!-- Process section -->
<section class="process-section spad bg-default">
  <div class="container">
    <div class="section-title text-center">
      <h2>Bagaimana Cara Kami Bekerja</h2>
    </div>
    <div class="row">
      <div class="col-md-4 process">
        <div class="process-step">
          <figure class="process-icon">
            <img src="/landing-page-assets/img/process-icons/1.png" alt="#">
          </figure>
          <h4>Create Your Wallet</h4>
          <p>Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
        </div>
      </div>
      <div class="col-md-4 process">
        <div class="process-step">
          <figure class="process-icon">
            <img src="/landing-page-assets/img/process-icons/2.png" alt="#">
          </figure>
          <h4>Create Your Wallet</h4>
          <p>Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
        </div>
      </div>
      <div class="col-md-4 process">
        <div class="process-step">
          <figure class="process-icon">
            <img src="/landing-page-assets/img/process-icons/3.png" alt="#">
          </figure>
          <h4>Create Your Wallet</h4>
          <p>Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Process section end -->

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
    <div class="member">
      <div class="member-text">
        <div class="member-img set-bg" data-setbg="/landing-page-assets/img/member/1.jpg"></div>
        <h2>Tom Binegar</h2>
        <span>Business Development</span>
      </div>
      <div class="member-social">
        <a href=""><i class="fa fa-facebook"></i></a>
        <a href=""><i class="fa fa-linkedin"></i></a>
        <a href=""><i class="fa fa-twitter"></i></a>
      </div>
      <div class="member-info">
        <div class="member-img mf set-bg" data-setbg="/landing-page-assets/img/member/1.jpg"></div>
        <div class="member-meta">
          <h2>Tom Binegar</h2>
          <span>Marketing Director</span>
        </div>
        <p>Jackson Nash is a full-time faculty member of the Marketing and Behavioural Science Division at the Sauder School of Business at UBC. He leads the Entrepreneurship Group, in the undergraduate and graduate programs, teaching actively in both of these.</p>
      </div>
    </div>
    <!-- Team member -->
    <div class="member">
      <div class="member-text">
        <div class="member-img set-bg" data-setbg="/landing-page-assets/img/member/2.jpg"></div>
        <h2>Jackson Nash</h2>
        <span>Business Development</span>
      </div>
      <div class="member-social">
        <a href=""><i class="fa fa-facebook"></i></a>
        <a href=""><i class="fa fa-linkedin"></i></a>
        <a href=""><i class="fa fa-twitter"></i></a>
      </div>
      <div class="member-info">
        <div class="member-img mf set-bg" data-setbg="/landing-page-assets/img/member/2.jpg"></div>
        <div class="member-meta">
          <h2>Jackson Nash</h2>
          <span>Marketing Director</span>
        </div>
        <p>Jackson Nash is a full-time faculty member of the Marketing and Behavioural Science Division at the Sauder School of Business at UBC. He leads the Entrepreneurship Group, in the undergraduate and graduate programs, teaching actively in both of these.</p>
      </div>
    </div>
    <!-- Team member -->
    <div class="member">
      <div class="member-text">
        <div class="member-img set-bg" data-setbg="/landing-page-assets/img/member/3.jpg"></div>
        <h2>Tom Binegar</h2>
        <span>Business Development</span>
      </div>
      <div class="member-social">
        <a href=""><i class="fa fa-facebook"></i></a>
        <a href=""><i class="fa fa-linkedin"></i></a>
        <a href=""><i class="fa fa-twitter"></i></a>
      </div>
      <div class="member-info">
        <div class="member-img mf set-bg" data-setbg="/landing-page-assets/img/member/3.jpg"></div>
        <div class="member-meta">
          <h2>Aaron Ballance</h2>
          <span>Ceo Bitcoin</span>
        </div>
        <p>Jackson Nash is a full-time faculty member of the Marketing and Behavioural Science Division at the Sauder School of Business at UBC. He leads the Entrepreneurship Group, in the undergraduate and graduate programs, teaching actively in both of these.</p>
      </div>
    </div>
    <!-- Team member -->
    <div class="member">
      <div class="member-text">
        <div class="member-img set-bg" data-setbg="/landing-page-assets/img/member/4.jpg"></div>
        <h2>Melissa Barth</h2>
        <span>Product Manager</span>
      </div>
      <div class="member-social">
        <a href=""><i class="fa fa-facebook"></i></a>
        <a href=""><i class="fa fa-linkedin"></i></a>
        <a href=""><i class="fa fa-twitter"></i></a>
      </div>
      <div class="member-info">
        <div class="member-img mf set-bg" data-setbg="/landing-page-assets/img/member/4.jpg"></div>
        <div class="member-meta">
          <h2>Melissa Barth</h2>
          <span>Product Manager</span>
        </div>
        <p>Jackson Nash is a full-time faculty member of the Marketing and Behavioural Science Division at the Sauder School of Business at UBC. He leads the Entrepreneurship Group, in the undergraduate and graduate programs, teaching actively in both of these.</p>
      </div>
    </div>
    <!-- Team member -->
    <div class="member">
      <div class="member-text">
        <div class="member-img set-bg" data-setbg="/landing-page-assets/img/member/5.jpg"></div>
        <h2>Katy Abrams</h2>
        <span>Head of Design</span>
      </div>
      <div class="member-social">
        <a href=""><i class="fa fa-facebook"></i></a>
        <a href=""><i class="fa fa-linkedin"></i></a>
        <a href=""><i class="fa fa-twitter"></i></a>
      </div>
      <div class="member-info">
        <div class="member-img mf set-bg" data-setbg="/landing-page-assets/img/member/5.jpg"></div>
        <div class="member-meta">
          <h2>Katy Abrams</h2>
          <span>Head of Design</span>
        </div>
        <p>Jackson Nash is a full-time faculty member of the Marketing and Behavioural Science Division at the Sauder School of Business at UBC. He leads the Entrepreneurship Group, in the undergraduate and graduate programs, teaching actively in both of these.</p>
      </div>
    </div>
  </div>
</section>
<!-- Team section -->

@include('layouts.landing-page.footer')