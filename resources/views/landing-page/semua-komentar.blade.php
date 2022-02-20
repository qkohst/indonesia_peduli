@include('layouts.landing-page.header')

<section class="page-info-section">
  <div class="container">
    <h2>{{$title}}</h2>
    <div class="site-beradcamb">
      <a href="/">Donasi</a>
      <a href="/program/{{$program_donasi->id}}"><i class="fa fa-angle-right"></i> Detail Program</a>
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
          <h2 class="blog-title">{{$data_komentar->count()}} Komentar</h2>

          <ul class="comment-list">
            @foreach($data_komentar as $komentar)
            <li>
              <div class="comment">
                <div class="comment-avator set-bg" data-setbg="/avatar/{{$komentar->user->avatar}}"></div>
                <div class="comment-content">
                  <h5>{{$komentar->user->nama_lengkap}}<span>, {{$komentar->created_at->diffForhumans()}}</span></h5>
                  <p>{{$komentar->komentar}}</p>
                  <h5 class="mb-0">
                    <span>0 Like</span>
                    <span>{{$komentar->data_balas_komentar->count()}} Replay</span>
                  </h5>
                  <button class="btn c-btn mt-2">Like</button>
                  <button class="btn c-btn mt-2" id="btnReplay{{$komentar->id}}" onclick="showHideForm({{$komentar->id}})">Reply</button>

                  <form id="formReplay{{$komentar->id}}" class="comment-form mt-2 form-replay" style="display:none;" action="{{ route('balas-komentar.store') }}" method="POST">
                    @csrf
                    <div class="form-group clearfix">
                      <input type="hidden" name="komentar_id" value="{{$komentar->id}}">
                      <textarea placeholder="Balas komentar" name="komentar" required></textarea>
                      <label></label>
                    </div>
                    <button class="site-btn bg-white no-radius mt-1 mr-2" id="btnCancel{{$komentar->id}}" onclick="hideForm({{$komentar->id}})">Batal</button>
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
                      <a href="" class="c-btn">Like</a>
                    </div>
                  </div>
                </li>
                @endforeach
              </ul>
            </li>
            @endforeach
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