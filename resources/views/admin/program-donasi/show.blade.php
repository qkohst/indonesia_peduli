@include('admin.layouts.header')
@include('admin.layouts.sidebar')
@include('admin.layouts.top-nav')

<div class="right_col" role="main">

  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>{{$title}}</h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2>{{$title}}</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>

              </li>
              <li><a class="close-link" href="{{ route('program-donasi.index') }}"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <div class="col-md-7 col-sm-7 ">
              <div class="product-image">
                <img src="/gambar-program-donasi/{{$program_donasi->gambar}}" alt="Gambar" />
              </div>
            </div>

            <div class="col-md-5 col-sm-5 " style="border:0px solid #e5e5e5;">

              <h2 class="prod_title">{{$program_donasi->judul}}</h2>

              <p>{{$program_donasi->deskripsi}}</p>
              <br />

              <div class="">
                <h2>Batas <small>Akhir Donasi</small></h2>
                <ul class="list-inline prod_size display-layout">
                  <li>
                    <button type="button" class="btn btn-default btn-xs">{{$program_donasi->batas_akhir_donasi->diffForhumans()}}</button>
                  </li>
                  <li>
                    <button type="button" class="btn btn-default btn-xs"><i class="fa fa-users"></i> {{$data_donasi->count()}} donatur</button>
                  </li>
                </ul>
              </div>

              <div class="">
                <h2>Dana Terkumpul</h2>
                <div class="product_price">
                  <h1 class="price">{{rupiah($data_donasi->sum('gross_amount'))}}</h1>
                  <span class="price-tax">Kebutuhan Dana: {{rupiah($program_donasi->kebutuhan_dana)}}</span>
                  <br>
                </div>
              </div>

              <div class="">
                <button type="button" class="btn btn-default btn-lg"><i class="fa fa-share-alt"></i> Bagikan</button>
                <button type="button" class="btn btn-default btn-lg">Donasikan</button>
              </div>
            </div>


            <div class="col-md-12">

              <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="kisah-tab" data-toggle="tab" href="#kisah" role="tab" aria-controls="kisah" aria-selected="true">Kisah</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="donatur-tab" data-toggle="tab" href="#donatur" role="tab" aria-controls="donatur" aria-selected="false">Para Donatur</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="komentar-tab" data-toggle="tab" href="#komentar" role="tab" aria-controls="komentar" aria-selected="false">Komentar</a>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="kisah" role="tabpanel" aria-labelledby="kisah-tab">
                  {!!$program_donasi->kisah!!}
                </div>

                <div class="tab-pane fade" id="donatur" role="tabpanel" aria-labelledby="donatur-tab">
                  <!-- start recent activity -->
                  <ul class="messages">
                    @foreach($data_donasi as $donasi)
                    <li>
                      <img src="/avatar/{{$donasi->user->avatar}}" class="avatar" alt="Avatar">
                      <div class="message_date">
                        <h3 class="date text-info">{{$donasi->updated_at->format('d')}}</h3>
                        <p class="month">{{$donasi->updated_at->format('M Y')}}</p>
                      </div>
                      <div class="message_wrapper">
                        <h4 class="heading">{{$donasi->user->nama_lengkap}}</h4>
                        <blockquote class="message"><b>{{rupiah($donasi->gross_amount)}}</b></blockquote>
                        <br />
                        <p class="mr-4">{{$donasi->doa}}</p>
                      </div>
                    </li>
                    @endforeach
                  </ul>
                  <!-- end recent activity -->
                </div>
                <div class="tab-pane fade" id="komentar" role="tabpanel" aria-labelledby="komentar-tab">
                  <ul class="messages">
                    @if($data_komentar->count() == 0)
                    <blockquote class="message"><b>Belum ada komentar</b></blockquote>
                    @endif

                    @foreach($data_komentar as $komentar)
                    <li>
                      <img src="/avatar/{{$komentar->user->avatar}}" class="avatar" alt="Avatar">
                      <div class="message_wrapper">
                        <h4 class="heading">{{$komentar->user->nama_lengkap}}</h4>
                        <blockquote class="message">{{$komentar->created_at->diffForhumans()}}</blockquote>
                        <p class="mr-4 mt-2">{{$komentar->komentar}}</p>

                        @foreach($komentar->data_balas_komentar as $balas_komentar)
                        <ul class="messages">
                          <li>
                            <img src="/avatar/{{$balas_komentar->user->avatar}}" class="avatar" alt="Avatar">
                            <div class="message_wrapper">
                              <h4 class="heading">{{$balas_komentar->user->nama_lengkap}}</h4>
                              <blockquote class="message">{{$balas_komentar->created_at->diffForhumans()}}</blockquote>
                              <p class="mr-4 mt-2">{{$balas_komentar->komentar_balas}}</p>
                            </div>
                          </li>
                        </ul>
                        @endforeach
                        
                      </div>
                    </li>
                    @endforeach
                  </ul>
                </div>
              </div>
              <!-- LANJUT FORM COMENT -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

@include('admin.layouts.footer')