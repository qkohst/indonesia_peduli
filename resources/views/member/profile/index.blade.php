@include('layouts.landing-page.header')

<!-- Page info section -->
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
      <div class="col-lg-4 offset-lg-1">
        <div class="about-img">
          <img src="/avatar/{{Auth::user()->avatar}}" alt="Avatar" width="350px">
        </div>
      </div>
      <div class="col-lg-8 offset-lg-4 about-text">
        <h2>{{Auth::user()->nama_lengkap}}</h2>
        <h5>Bitcoin is an innovative payment network and a new kind of money.</h5>
        <p>Bitcoin is one of the most important inventions in all of human history. For the first time ever, anyone can send or receive any amount of money with anyone else, anywhere on the planet, conveniently and without restriction. It’s the dawn of a better, more free world.</p>
        <a href="" class="site-btn sb-gradients mt-2 mr-3">Edit Profile</a>
        <a href="{{ route('logout') }}" class="site-btn sbg-line mt-2">Keluar/Logout</a>
      </div>
    </div>

  </div>
</section>
<!-- About section end -->

@include('layouts.landing-page.footer')