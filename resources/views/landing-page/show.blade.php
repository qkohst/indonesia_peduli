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
            <a><i class="fa fa-users text-primary"></i> 0 donatur</a>
            <a class="float-right"><span>Berakhir : </span> {{$program_donasi->batas_akhir_donasi->format('d M Y')}}</a>
          </p>
          <div class=" progress" style="height: 10px;">
            <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <div class="post-meta">
            <a><small>Terdanai</small></a>
            <a class="float-right"><small>Kekurangan</small></a>
          </div>
          <div class="post-meta">
            <a class="text-primary">
              <b>{{rupiah($program_donasi->kebutuhan_dana)}}</b>
            </a>
            <a class="float-right text-secondary">
              <b>{{rupiah($program_donasi->kebutuhan_dana)}}</b>
            </a>
          </div>

          <div class="row mt-2">
            <div class="col-lg-6">
              <a href="#" class="site-btn btn-block sb-line mt-2"><i class="fa fa-heart-o"></i> Likes</a>
            </div>
            <div class="col-lg-6">
              <a href="#" class="site-btn btn-block sbg-line mt-2"><i class="fa fa-share"></i> Share</a>
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
                <a href="#nav-donatur" class="nav-link" data-bs-toggle="tab" id="nav-donatur-tab"> Para Donatur (0)</a>
              </li>
              <li class="nav-item">
                <a href="#nav-komentar" class="nav-link" data-bs-toggle="tab" id="nav-komentar-tab"> Komentar (0)</a>
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
              <h4>Para Donatur (0)</h4>
              <ul class="comment-list">
                <li>
                  <div class="comment">
                    <div class="comment-avator set-bg" data-setbg="/landing-page-assets/img/blog/comment/1.jpg"></div>
                    <div class="comment-content">
                      <h5>Kelly Richardson<span>, 24 Mar 2018</span></h5>
                      <h5>Donasi <b>Rp.20.000.00</b></h5>
                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate ut recusandae cum molestias quia rerum dolor, et autem at perferendis consequuntur totam neque est aut optio iusto quibusdam vitae voluptatem.</p>
                    </div>
                  </div>
                </li>
                <hr>

                <li>
                  <div class="comment">
                    <div class="comment-avator set-bg" data-setbg="/landing-page-assets/img/blog/comment/1.jpg"></div>
                    <div class="comment-content">
                      <h5>Kelly Richardson<span>, 24 Mar 2018</span></h5>
                      <h5>Donasi <b>Rp.20.000.00</b></h5>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius a excepturi atque cum voluptates iure aliquid distinctio, aspernatur asperiores ut hic corporis aperiam itaque ipsa nobis voluptatem, temporibus eaque dolore!</p>
                    </div>
                  </div>
                </li>
                <hr>

              </ul>
            </div>

            <div class="tab-pane fade" id="nav-komentar" role="tabpanel" aria-labelledby="nav-komentar-tab">
              <h4>0 Komentar</h4>
              <ul class="comment-list">
                <li>
                  <div class="comment">
                    <div class="comment-avator set-bg" data-setbg="/landing-page-assets/img/blog/comment/1.jpg"></div>
                    <div class="comment-content">
                      <h5>Kelly Richardson<span>, 24 Mar 2018</span></h5>
                      <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam.</p>
                      <a href="" class="c-btn">Like</a>
                      <a href="" class="c-btn">Reply</a>
                    </div>
                  </div>
                  <ul class="replay-comment-list">
                    <li>
                      <div class="comment">
                        <div class="comment-avator set-bg" data-setbg="/landing-page-assets/img/blog/comment/2.jpg"></div>
                        <div class="comment-content">
                          <h5>Gordon Browns<span>, 24 Mar 2018</span></h5>
                          <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore.</p>
                          <a href="" class="c-btn">Like</a>
                          <a href="" class="c-btn">Reply</a>
                        </div>
                      </div>
                    </li>
                  </ul>
                </li>
                <li>
                  <div class="comment">
                    <div class="comment-avator set-bg" data-setbg="/landing-page-assets/img/blog/comment/3.jpg"></div>
                    <div class="comment-content">
                      <h5>Scott Langton<span>, 24 Mar 2018</span></h5>
                      <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam.</p>
                      <a href="" class="c-btn">Like</a>
                      <a href="" class="c-btn">Reply</a>
                    </div>
                  </div>
                </li>
              </ul>

              <form class="comment-form">
                <div class="form-group">
                  <input type="text" placeholder="Your name *:">
                  <label></label>
                </div>
                <div class="form-group">
                  <input type="email" placeholder="Your email *:">
                  <label></label>
                </div>
                <div class="form-group">
                  <input type="text" placeholder="Your Phone *:">
                  <label></label>
                </div>
                <div class="form-group clearfix">
                  <textarea placeholder="Your comment"></textarea>
                  <label></label>
                </div>
                <button class="site-btn sb-gradients no-radius mt-3">Submit Now</button>
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

@include('layouts.landing-page.footer')