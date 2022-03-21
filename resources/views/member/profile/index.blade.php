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
      <div class="col-md-3">
        <div class="widget-area">
          <div class="widget">
            <h4 class="widget-title">{{$title}}</h4>
            <ul>
              <li><a href="{{ route('member.profile.edit') }}">Edit Profile</a></li>
              <li><a href="{{ route('member.profile.password') }}">Ganti Password</a></li>
              <li><a href="{{ route('logout') }}">Keluar/Logout</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-9">
        <div class="widget-area">
          <div class="row">
            <div class="col-lg-3 offset-lg-2">
              <div class="about-img">
                <img src="/avatar/{{Auth::user()->avatar}}" alt="Avatar" width="250 px">
              </div>
            </div>
            <div class="col-lg-9 offset-lg-5 about-text">
              <h2 class="my-1">{{Auth::user()->nama_lengkap}}</h2>
              <h5 class="mt-1 mb-4">{{Auth::user()->email}}</h5>
              <p class="my-1">Nomor HP : {{Auth::user()->nomor_hp}}</p>
              <p class="my-1">Jenis Kelamin :
                @if (Auth::user()->jenis_kelamin == 'L')
                Laki-Laki
                @else
                Perempuan
                @endif
              </p>
              <a href="{{ route('logout') }}" class="site-btn sb-gradients mt-2">Keluar/Logout</a>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>
<!-- About section end -->

@include('layouts.landing-page.footer')