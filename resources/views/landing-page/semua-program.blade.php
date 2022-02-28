@include('layouts.landing-page.header')

<!-- Page info section -->
<section class="page-info-section">
  <div class="container">
    <h2>{{$title}}</h2>
    <div class="site-beradcamb">
      <a href="/">Donasi</a>
      <span><i class="fa fa-angle-right"></i> {{$title}}</span>
    </div>
  </div>
</section>
<!-- Page info end -->



<!-- Contact section -->
@foreach($data_kategori_donasi as $kategori_donasi)

@if($kategori_donasi->data_program_donasi->count() != 0)
<section class="blog-page spad pt-4 pb-4">
  <div class="container">
    <div class="blog-text">
      <div class="section-title">
        <h3>{{$kategori_donasi->nama_kategori}}</h3>
        <hr>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <!-- blog item -->
            @foreach($kategori_donasi->data_program_donasi as $program_donasi)
            <a href="{{ route('home.show', $program_donasi->id) }}">
              <div class="col-lg-4 col-md-6">
                <div class="blog-item">
                  <figure class="blog-thumb">
                    <img src="/gambar-program-donasi/{{$program_donasi->gambar}}" alt="" height="200px" class="mx-auto d-block">
                  </figure>
                  <div class="blog-text">
                    <div class="post-date">Berakhir {{$program_donasi->batas_akhir_donasi->diffForHumans()}}</div>
                    <h4 class="blog-title">{{Str::limit($program_donasi->deskripsi, 25, $end='...')}}</h4>

                    <div class=" progress" style="height: 5px;">
                      <div class="progress-bar" role="progressbar" style="width: {{$program_donasi->prosentasi_terdanai}}%" aria-valuenow="{{$program_donasi->prosentasi_terdanai}}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>

                    <div class="post-meta">
                      <a class="float-left"><span>Terdanai</span></a>
                      <a class="float-right"><span>Kekurangan</span></a>
                    </div>
                    <div class="post-meta">
                      <a>{{rupiah($program_donasi->terdanai)}}</a>
                      <a class="float-right">{{rupiah($program_donasi->kebutuhan_dana - $program_donasi->terdanai)}}</a>
                    </div>

                    <div class="post-meta mt-2">
                      <a><i class="fa fa-users"></i> {{$program_donasi->jumlah_donatur}} donatur</a>
                      @if(is_null($program_donasi->is_liked))
                      <a><i class="fa fa-heart-o"></i> {{$program_donasi->jumlah_like}} likes</a>
                      @else
                      <a><i class="fa fa-heart"></i> {{$program_donasi->jumlah_like}} likes</a>
                      @endif
                      <a><i class="fa fa-comments-o"></i> {{$program_donasi->jumlah_komentar}} comments</a>
                    </div>
                  </div>
                </div>
              </div>
            </a>
            @endforeach
          </div>
        </div>
      </div>
      <a href="{{ route('home.kategori', $kategori_donasi->id) }}" class="post-loadmore site-btn sb-gradients sbg-line mt-0">LIHAT LAINNYA</a>
    </div>
  </div>
</section>
@endif

@endforeach
<!-- Contact section end -->

@include('layouts.landing-page.footer')