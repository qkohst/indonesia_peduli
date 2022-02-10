@include('layouts.landing-page.header')

<!-- Hero section -->
<section class="hero-section">
  <div class="container">
    <div class="row">
      <div class="col-md-6 hero-text">
        <h2>Invest in <span>Bitcoin</span> <br>Bitcoin Trading</h2>
        <h4>Use modern progressive technologies of Bitcoin to earn money</h4>
        <form class="hero-subscribe-from">
          <input type="text" placeholder="Enter your email">
          <button class="site-btn sb-gradients">Get Started</button>
        </form>
      </div>
      <div class="col-md-6">
        <img src="/landing-page-assets//landing-page-assets/img/laptop.png" class="laptop-image" alt="">
      </div>
    </div>
  </div>
</section>
<!-- Hero section end -->

<!-- Blog section -->
<section class="blog-page spad">
  <div class="container">
    <div class="section-title text-center">
      <h2>Program Donasi</h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia sed, animi doloremque tempora quaerat fugit architecto dolor quae, nesciunt sit dolores modi, commodi magnam. Alias a blanditiis non odio nisi!</p>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="row">
          <!-- blog item -->
          @foreach($data_program_donasi as $program_donasi)
          <div class="col-md-4">
            <div class="blog-item">
              <figure class="blog-thumb">
                <img src="/gambar-program-donasi/{{$program_donasi->gambar}}" alt="" height="200px" class="mx-auto d-block">
              </figure>
              <div class="blog-text">
                <div class="post-date">Berakhir Pada : {{$program_donasi->batas_akhir_donasi->format('d M Y')}}</div>
                <h4 class="blog-title"><a href="{{ route('home.show', $program_donasi->id) }}">{{Str::limit($program_donasi->deskripsi, 25, $end='...')}}</a></h4>

                <div class=" progress" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>

                <div class="post-meta">
                  <a><span>Terdanai</span></a>
                  <a class="float-right"><span>Kekurangan</span></a>
                </div>
                <div class="post-meta">
                  <a>{{rupiah($program_donasi->kebutuhan_dana)}}</a>
                  <a class="float-right">{{rupiah($program_donasi->kebutuhan_dana)}}</a>
                </div>

                <div class="post-meta mt-2">
                  <a href=""><i class="fa fa-users"></i> 0 donatur</a>
                  <a href=""><i class="fa fa-heart-o"></i> 0 likes</a>
                  <a href=""><i class="fa fa-comments-o"></i> 0 comments</a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <button class="post-loadmore site-btn sb-gradients sbg-line mt-5">LOAD MORE</button>
      </div>
    </div>
  </div>
</section>
<!-- Blog section end -->

@include('layouts.landing-page.footer')