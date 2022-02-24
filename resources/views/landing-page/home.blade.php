@include('layouts.landing-page.header')

<!-- Hero section -->
<section class="hero-section">
  <div class="container">
    <div class="row">
      <div class="col-md-6 hero-text">
        <h2>Peduli Sesama <span>di</span> <br>Indonesia Peduli</h2>
        <h4>Uluran tangan anda, sangat berharga bagi mereka.</h4>
        <form class="hero-subscribe-from">
          <input type="text" placeholder="Enter your email">
          <button class="site-btn sb-gradients">Get Started</button>
        </form>
      </div>
      <div class="col-md-6">
        <img src="/landing-page-assets/img/laptop.png" class="laptop-image" alt="">
      </div>
    </div>
  </div>
</section>
<!-- Hero section end -->

<!-- Blog section -->
<section class="blog-page spad pb-2">
  <div class="container">
    <div class="section-title text-center">
      <h3>Program Donasi Mendesak</h3>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="row">
          <!-- blog item -->
          @foreach($data_program_donasi_mendesak as $program_donasi_mendesak)
          <a href="{{ route('home.show', $program_donasi_mendesak->id) }}">
            <div class="col-lg-4 col-md-6">
              <div class="blog-item">
                <figure class="blog-thumb">
                  <img src="/gambar-program-donasi/{{$program_donasi_mendesak->gambar}}" alt="" height="200px" class="mx-auto d-block">
                </figure>
                <div class="blog-text">
                  <div class="post-date">Berakhir {{$program_donasi_mendesak->batas_akhir_donasi->diffForHumans()}}</div>
                  <h4 class="blog-title">{{Str::limit($program_donasi_mendesak->deskripsi, 25, $end='...')}}</h4>

                  <div class=" progress" style="height: 5px;">
                    <div class="progress-bar" role="progressbar" style="width: {{$program_donasi_mendesak->prosentasi_terdanai}}%" aria-valuenow="{{$program_donasi_mendesak->prosentasi_terdanai}}" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>

                  <div class="post-meta">
                    <a class="float-left"><span>Terdanai</span></a>
                    <a class="float-right"><span>Kekurangan</span></a>
                  </div>
                  <div class="post-meta">
                    <a>{{rupiah($program_donasi_mendesak->terdanai)}}</a>
                    <a class="float-right">{{rupiah($program_donasi_mendesak->kebutuhan_dana - $program_donasi_mendesak->terdanai)}}</a>
                  </div>

                  <div class="post-meta mt-2">
                    <a><i class="fa fa-users"></i> {{$program_donasi_mendesak->jumlah_donatur}} donatur</a>
                    @if(is_null($program_donasi_mendesak->is_liked))
                    <a><i class="fa fa-heart-o"></i> {{$program_donasi_mendesak->jumlah_like}} likes</a>
                    @else
                    <a><i class="fa fa-heart"></i> {{$program_donasi_mendesak->jumlah_like}} likes</a>
                    @endif
                    <a><i class="fa fa-comments-o"></i> {{$program_donasi_mendesak->jumlah_komentar}} comments</a>
                  </div>
                </div>
              </div>
            </div>
          </a>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

<section class="blog-page spad pt-2 mt-0">
  <div class="container">
    <div class="section-title text-center">
      <h3>Program Donasi Lain</h3>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="row">
          <!-- blog item -->
          @foreach($data_program_donasi_lain as $program_donasi_lain)
          <a href="{{ route('home.show', $program_donasi_lain->id) }}">
            <div class="col-lg-4 col-md-6">
              <div class="blog-item">
                <figure class="blog-thumb">
                  <img src="/gambar-program-donasi/{{$program_donasi_lain->gambar}}" alt="" height="200px" class="mx-auto d-block">
                </figure>
                <div class="blog-text">
                  <div class="post-date">Berakhir {{$program_donasi_lain->batas_akhir_donasi->diffForHumans()}}</div>
                  <h4 class="blog-title">{{Str::limit($program_donasi_lain->deskripsi, 25, $end='...')}}</h4>

                  <div class=" progress" style="height: 5px;">
                    <div class="progress-bar" role="progressbar" style="width: {{$program_donasi_lain->prosentasi_terdanai}}%" aria-valuenow="{{$program_donasi_lain->prosentasi_terdanai}}" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>

                  <div class="post-meta">
                    <a class="float-left"><span>Terdanai</span></a>
                    <a class="float-right"><span>Kekurangan</span></a>
                  </div>
                  <div class="post-meta">
                    <a>{{rupiah($program_donasi_lain->terdanai)}}</a>
                    <a class="float-right">{{rupiah($program_donasi_lain->kebutuhan_dana - $program_donasi_lain->terdanai)}}</a>
                  </div>

                  <div class="post-meta mt-2">
                    <a><i class="fa fa-users"></i> {{$program_donasi_lain->jumlah_donatur}} donatur</a>
                    @if(is_null($program_donasi_lain->is_liked))
                    <a><i class="fa fa-heart-o"></i> {{$program_donasi_lain->jumlah_like}} likes</a>
                    @else
                    <a><i class="fa fa-heart"></i> {{$program_donasi_lain->jumlah_like}} likes</a>
                    @endif
                    <a><i class="fa fa-comments-o"></i> {{$program_donasi_lain->jumlah_komentar}} comments</a>
                  </div>
                </div>
              </div>
            </div>
          </a>
          @endforeach
        </div>
        <a href="{{ route('home.all') }}" class="post-loadmore site-btn sb-gradients sbg-line mt-5">LIHAT SEMUA PROGRAM</a>
      </div>
    </div>
  </div>
</section>
<!-- Blog section end -->

@include('layouts.landing-page.footer')