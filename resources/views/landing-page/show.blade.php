@include('layouts.landing-page.header')

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
          <h4 class="widget-title">{{$program_donasi->judul}}</h4>
          <p>
            <a><i class="fa fa-users text-primary"></i> {{$program_donasi->jumlah_donatur}} donatur</a>
            <a class="float-right"><span>Berakhir : </span> {{$program_donasi->batas_akhir_donasi->format('d M Y')}}</a>
          </p>
          <div class=" progress" style="height: 10px;">
            <div class="progress-bar" role="progressbar" style="width: {{$program_donasi->prosentasi_terdanai}}%" aria-valuenow="{{$program_donasi->prosentasi_terdanai}}" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <div class="post-meta">
            <a><small>Terdanai</small></a>
            <a class="float-right"><small>Kekurangan</small></a>
          </div>
          <div class="post-meta">
            <a class="text-primary">
              <b>{{rupiah($program_donasi->terdanai)}}</b>
            </a>
            <a class="float-right text-secondary">
              <b>{{rupiah($program_donasi->kebutuhan_dana-$program_donasi->terdanai)}}</b>
            </a>
          </div>

          @if(is_null($program_donasi->is_liked))
          <p id="like-count">
            <i class="fa fa-heart-o"></i> <b>{{$program_donasi->jumlah_like}} orang</b> menyukai ini
          </p>
          <p class="d-none" id="your-like-count">
            <i class="fa fa-heart"></i> <b>Kamu</b> dan <b>{{$program_donasi->jumlah_like}} orang lainnya</b> menyukai ini
          </p>
          @else
          <p class="d-none" id="like-count">
            <i class="fa fa-heart-o"></i> <b>{{$program_donasi->jumlah_like-1}} orang</b> menyukai ini
          </p>
          <p id="your-like-count">
            <i class="fa fa-heart"></i> <b>Kamu</b> dan <b>{{$program_donasi->jumlah_like-1}} orang lainnya</b> menyukai ini
          </p>
          @endif

          <div class="row mt-1">
            <div class="col-lg-6">
              @if(is_null($program_donasi->is_liked))
              <button class="site-btn btn-block sb-line mt-2 bg-white" id="like-program-button" value="{{$program_donasi->id}}"><i class="fa fa-heart-o"></i> <span id="like-span">Likes</span></button>
              @else
              <button class="site-btn btn-block sb-gradients mt-2" id="like-program-button" value="{{$program_donasi->id}}"><i class="fa fa-heart-o"></i> <span id="like-span">Unlikes</span></button>
              @endif
            </div>
            <div class="col-lg-6">
              <button type="button" class="site-btn btn-block sbg-line mt-2 bg-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fa fa-share"></i> Share
              </button>

              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Bagikan Lewat</h5>
                    </div>
                    <div class="modal-body">
                      <div class="social">
                        <a href="" class="bg-success"><i class="fa fa-whatsapp"></i></a>
                        <a href="" class="instagram"><i class="fa fa-instagram"></i></a>
                        <a href="http://www.facebook.com/sharer.php?u=https://dumetschool.com" target="_black" class="facebook"><i class="fa fa-facebook"></i></a>
                        <a href="https://twitter.com/share?url=https://dumetschool.com&text=Simple%20Share%20Buttons&hashtags=simplesharebuttons" target="_black" class="twitter"><i class="fa fa-twitter"></i></a>
                        <a href="https://plus.google.com/share?url=https://dumetschool.com" target="_black" class="google"><i class="fa fa-google-plus"></i></a>
                        <a href="" class="bg-secondary"><i class="fa fa-link"></i></a>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="site-btn sbg-line" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <a href="{{ route('donasi.show', $program_donasi->id) }}" class="site-btn btn-block sb-gradients mt-3">Donasi Sekarang</a>
        </div>
      </div>
    </div>

    <div class="row mt-6">
      <div class="col-lg-12">
        <div class="blog-text">
          <h2 class="blog-title">{{$program_donasi->judul}}</h2>

          <div class="post-meta mb-4">
            <ul class="nav nav-tabs">
              <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" id="nav-kisah-tab" href="#nav-kisah">Cerita/Kisah</a>
              </li>
              <li class="nav-item">
                <a href="#nav-donatur" class="nav-link" data-bs-toggle="tab" id="nav-donatur-tab"> Para Donatur ({{$program_donasi->jumlah_donatur}})</a>
              </li>
              <li class="nav-item">
                <a href="#nav-komentar" class="nav-link" data-bs-toggle="tab" id="nav-komentar-tab"> Komentar ({{$data_komentar->count}})</a>
              </li>
              <li class="nav-item">
                <a href="#nav-penyaluran" class="nav-link" data-bs-toggle="tab" id="nav-penyaluran-tab"> Penyaluran Dana</a>
              </li>
            </ul>
          </div>

          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-kisah" role="tabpanel" aria-labelledby="nav-kisah-tab">
              <h4 class="mb-2">{{$program_donasi->deskripsi}}</h4>
              <hr>
              {!!$program_donasi->kisah!!}
            </div>

            <div class="tab-pane fade" id="nav-donatur" role="tabpanel" aria-labelledby="nav-donatur-tab">
              <h4>Para Donatur ({{$program_donasi->jumlah_donatur}})</h4>
              <ul class="comment-list">
                @foreach($data_donatur as $donatur)
                <li>
                  <div class="comment">
                    <div class="comment-avator set-bg" data-setbg="/avatar/{{$donatur->user->avatar}}"></div>
                    <div class="comment-content">
                      <h5>{{$donatur->user->nama_lengkap}}<span>, {{$donatur->created_at}}</span></h5>
                      <h5>Donasi <b>{{rupiah($donatur->gross_amount)}}</b></h5>
                      <p>{{$donatur->doa}}</p>
                    </div>
                  </div>
                </li>
                <hr>
                @endforeach
              </ul>
            </div>

            <div class="tab-pane fade" id="nav-komentar" role="tabpanel" aria-labelledby="nav-komentar-tab">
              <h4>{{$data_komentar->count}} Komentar</h4>
              <ul class="comment-list">
                @foreach($data_komentar as $komentar)
                <li>
                  <div class="comment">
                    <div class="comment-avator set-bg" data-setbg="/avatar/{{$komentar->user->avatar}}"></div>
                    <div class="comment-content">
                      <h5>{{$komentar->user->nama_lengkap}}<span>, {{$komentar->created_at->diffForhumans()}}</span></h5>
                      <p>{{$komentar->komentar}}</p>
                      <h5 class="mb-0">
                        @if(is_null($komentar->is_liked))
                        <span id="like-komentar-count{{$komentar->id}}"><i class="fa fa-heart-o"></i> <b>{{$komentar->jumlah_like}} orang</b> menyukai ini</span>
                        <span class="d-none" id="your-like-komentar-count{{$komentar->id}}"><i class="fa fa-heart"></i> <b>Kamu</b> dan <b>{{$komentar->jumlah_like}} orang</b> menyukai ini</span>
                        @else
                        <span class="d-none" id="like-komentar-count{{$komentar->id}}"><i class="fa fa-heart-o"></i> <b>{{$komentar->jumlah_like-1}} orang</b> menyukai ini</span>
                        <span id="your-like-komentar-count{{$komentar->id}}"><i class="fa fa-heart"></i> <b>Kamu</b> dan <b>{{$komentar->jumlah_like-1}} orang</b> menyukai ini</span>
                        @endif
                        <span><i class="fa fa-comments-o"></i> <b>{{$komentar->data_balas_komentar->count()}}</b> Replay</span>
                      </h5>

                      <button class="c-btn mt-2" id="like-komentar-button{{$komentar->id}}" onclick="likeUnlikeKomentar({{$komentar->id}})">Likes</button>

                      <button class="c-btn mt-2" id="btnReplay{{$komentar->id}}" onclick="showHideForm({{$komentar->id}})">Reply</button>

                      <form id="formReplay{{$komentar->id}}" class="comment-form mt-2 form-replay" style="display:none;" action="{{ route('balas-komentar.store') }}" method="POST">
                        @csrf
                        <div class="form-group clearfix mb-1">
                          <input type="hidden" name="komentar_id" value="{{$komentar->id}}">
                          <textarea placeholder="Balas komentar" name="komentar" required></textarea>
                          <label></label>
                        </div>
                        <button class="site-btn bg-white no-radius mt-1 mr-1" id="btnCancel{{$komentar->id}}" onclick="hideForm({{$komentar->id}})">Batal</button>
                        <button type="submit" class="site-btn sb-gradients no-radius mt-1">Kirim</button>
                      </form>
                      <hr>
                    </div>
                  </div>

                  <ul class="replay-comment-list list-replay" style="display:none;" id="replayComment{{$komentar->id}}">
                    @foreach($komentar->data_balas_komentar as $balas_komentar)
                    <li>
                      <div class="comment">
                        <div class="comment-avator set-bg" data-setbg="/avatar/{{$balas_komentar->user->avatar}}"></div>
                        <div class="comment-content">
                          <h5>{{$balas_komentar->user->nama_lengkap}}<span>, {{$balas_komentar->created_at->diffForhumans()}}</span></h5>
                          <p>{{$balas_komentar->komentar_balas}}</p>
                          <h5 class="mb-0">
                            <span>0 Like</span>
                          </h5>
                          <a href="" class="c-btn mt-2">Like</a>
                        </div>
                      </div>
                    </li>
                    @endforeach
                  </ul>
                </li>
                @endforeach

                @if($data_komentar->count != $data_komentar->count())
                <a href="{{ route('komentar.show', $program_donasi->id) }}" class="post-loadmore site-btn sb-gradients sbg-line mb-5">LIHAT SEMUA KOMENTAR</a>
                @endif
              </ul>

              <form class="comment-form" action="{{ route('komentar.store') }}" method="POST">
                @csrf
                <div class="form-group clearfix">
                  <input type="hidden" name="program_donasi_id" value="{{$program_donasi->id}}">
                  <textarea placeholder="Tulis komentar" name="komentar" required></textarea>
                  <label></label>
                </div>
                <button class="site-btn sb-gradients no-radius mt-3">Kirim</button>
              </form>
            </div>

            <div class="tab-pane fade" id="nav-penyaluran" role="tabpanel" aria-labelledby="nav-penyaluran-tab">
              <h4 class="mb-2">Penyaluran Dana</h4>
              <hr>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere maxime iste ratione magni, animi eligendi repellat delectus cum dolores sed ad ex laborum exercitationem et, necessitatibus optio dolore aliquid totam?
            </div>
          </div>

          <div class="releted-posts">
            <h4>Program Donasi Serupa</h4>
            <div class="row">
              <div class="col-md-4">
                <div class="blog-item">
                  <figure class="blog-thumb">
                    <img src="/landing-page-assets/img/blog/1.jpg" alt="">
                  </figure>
                  <div class="blog-text">
                    <div class="post-date">22 dec 2018</div>
                    <h4 class="blog-title"><a href="">Blockchain Rolls Out Trading Feature for 22 States in the U.S</a></h4>
                    <div class="post-meta">
                      <a href=""><span>by</span> Admin</a>
                      <a href=""><i class="fa fa-heart-o"></i> 234 Likes</a>
                      <a href=""><i class="fa fa-comments-o"></i> 08 comments</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="blog-item">
                  <figure class="blog-thumb">
                    <img src="/landing-page-assets/img/blog/1.jpg" alt="">
                  </figure>
                  <div class="blog-text">
                    <div class="post-date">22 dec 2018</div>
                    <h4 class="blog-title"><a href="">Blockchain Rolls Out Trading Feature for 22 States in the U.S</a></h4>
                    <div class="post-meta">
                      <a href=""><span>by</span> Admin</a>
                      <a href=""><i class="fa fa-heart-o"></i> 234 Likes</a>
                      <a href=""><i class="fa fa-comments-o"></i> 08 comments</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="blog-item">
                  <figure class="blog-thumb">
                    <img src="/landing-page-assets/img/blog/1.jpg" alt="">
                  </figure>
                  <div class="blog-text">
                    <div class="post-date">22 dec 2018</div>
                    <h4 class="blog-title"><a href="">Blockchain Rolls Out Trading Feature for 22 States in the U.S</a></h4>
                    <div class="post-meta">
                      <a href=""><span>by</span> Admin</a>
                      <a href=""><i class="fa fa-heart-o"></i> 234 Likes</a>
                      <a href=""><i class="fa fa-comments-o"></i> 08 comments</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <button class="post-loadmore site-btn sb-gradients sbg-line mt-5">LIHAT PROGRAM LAIN</button>
          </div>
        </div>

      </div>
    </div>
  </div>
  </div>
</section>
<!-- Blog section end -->

<script>
  function showHideForm(id) {
    const formReplay = document.getElementById("formReplay" + id);
    const replayComment = document.getElementById("replayComment" + id);
    if (formReplay.style.display == "block") {
      formReplay.style.display = "none";
      replayComment.style.display = "none";
    } else {
      formReplay.style.display = "block";
      replayComment.style.display = "block";
    }
  }

  function hideForm(id) {
    document.getElementById("formReplay" + id).style.display = "none";
    document.getElementById("replayComment" + id).style.display = "none";
  }

  function likeUnlikeKomentar(id) {
    let likeKomentarButton = document.getElementById('like-komentar-button' + id);
    let likeKomentarCount = document.getElementById('like-komentar-count' + id);
    let yourLikeKomentarCount = document.getElementById('your-like-komentar-count' + id);

    if (yourLikeKomentarCount.classList.contains('d-none')) {
      console.log('Like Komentar');
      yourLikeKomentarCount.classList.remove('d-none');
      likeKomentarCount.classList.add('d-none');
      likeKomentarButton.innerHTML = "Unlikes";

      $.ajax({
        url: "/member/like-komentar",
        type: "POST",
        dataType: 'json',
        data: {
          id: id,
          _token: "{{ csrf_token() }}"
        },
        success: function(result) {
          console.log(result);
        }
      });
    } else {
      console.log('UnLike Komentar');
      likeKomentarCount.classList.remove('d-none');
      yourLikeKomentarCount.classList.add('d-none');
      likeKomentarButton.innerHTML = "Likes";

      $.ajax({
        url: "/member/like-komentar/" + id,
        type: "DELETE",
        dataType: 'json',
        data: {
          _token: "{{ csrf_token() }}"
        },
        success: function(result) {
          console.log(result);
        }
      });
    }
  }
</script>

<script>
  let likeProgramButton = document.getElementById('like-program-button');
  let likeCount = document.getElementById('like-count');
  let yourLikeCount = document.getElementById('your-like-count');
  let likeSpan = document.getElementById('like-span');

  likeProgramButton.addEventListener('click', function(e) {
    var program_donasi_id = $(this).val();

    if (likeProgramButton.classList.contains('sb-line')) {
      console.log('Like');
      likeProgramButton.classList.remove('sb-line');
      likeProgramButton.classList.remove('bg-white');
      likeProgramButton.classList.add('sb-gradients');

      likeSpan.innerHTML = "Unlikes";

      likeCount.classList.add('d-none');
      yourLikeCount.classList.remove('d-none');

      $.ajax({
        url: "/member/like-program",
        type: "POST",
        dataType: 'json',
        data: {
          id: program_donasi_id,
          _token: "{{ csrf_token() }}"
        },
        success: function(result) {
          console.log(result);
        }
      });
      e.preventDefault();

    } else {
      console.log('Unlike');
      likeProgramButton.classList.remove('sb-gradients');
      likeProgramButton.classList.add('sb-line');
      likeProgramButton.classList.add('bg-white');

      likeSpan.innerHTML = "Likes";

      likeCount.classList.remove('d-none');
      yourLikeCount.classList.add('d-none');

      $.ajax({
        url: "/member/like-program/" + program_donasi_id,
        type: "DELETE",
        dataType: 'json',
        data: {
          _token: "{{ csrf_token() }}"
        },
        success: function(result) {
          console.log(result);
        }
      });
      e.preventDefault();

    }
  });
</script>

@include('layouts.landing-page.footer')