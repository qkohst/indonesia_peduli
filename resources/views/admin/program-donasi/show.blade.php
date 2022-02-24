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
                  <li class="mx-1">
                    {{$program_donasi->batas_akhir_donasi->diffForhumans()}}
                  </li>
                  <li class="mx-2">
                    <i class="fa fa-users"></i> {{$data_donasi->count()}} donatur
                  </li>
                  <li class="mx-2">
                    <i class="fa fa-heart"></i> {{$program_donasi->jumlah_like}} likes
                  </li>
                </ul>
              </div>

              <div class="">
                <h2>Dana Terkumpul</h2>
                <div class="product_price">
                  <h1 class="price">{{rupiah($data_donasi->sum('gross_amount'))}}</h1>
                  <span class="price-tax">Kebutuhan Dana: {{rupiah($program_donasi->kebutuhan_dana)}}</span> <br>
                  <span class="price-tax">Sisa Dana : {{rupiah($data_donasi->sum('gross_amount')-$data_penyaluran_dana->sum('jumlah'))}}</span>
                  <br>
                </div>
              </div>

              <div class="">
                <button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#modalBagikan"><i class="fa fa-share-alt"></i> Bagikan</button>
                <button type="button" class="btn btn-light btn-lg" data-toggle="modal" data-target="#modalPenyaluran"><i class="fa fa-credit-card"></i> Penyaluran Dana</button>
              </div>

              <!-- Modal Bagikan -->
              <div class="modal fade" id="modalBagikan" tabindex="-1" role="dialog" aria-labelledby="modalBagikanLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Bagikan Lewat</h5>
                    </div>
                    <div class="modal-body">
                      <div class="product_social">
                        <ul class="list-inline display-layout">
                          <li class="mr-3">
                            <a href="#"><i class="fa fa-whatsapp"></i></a>
                          </li>
                          <li class="mr-3">
                            <a href="#"><i class="fa fa-instagram"></i></a>
                          </li>
                          <li class="mr-3">
                            <a href="http://www.facebook.com/sharer.php?u=https://dumetschool.com" target="_black"><i class="fa fa-facebook"></i></a>
                          </li>
                          <li class="mr-3">
                            <a href="https://twitter.com/share?url=https://dumetschool.com&text=Simple%20Share%20Buttons&hashtags=simplesharebuttons" target="_black"><i class="fa fa-twitter"></i></a>
                          </li>
                          <li class="mr-3">
                            <a href="https://plus.google.com/share?url=https://dumetschool.com" target="_black"><i class="fa fa-google-plus"></i></a>
                          </li>
                          <li class="mr-3">
                            <a href="#"><i class="fa fa-link"></i></a>
                          </li>
                        </ul>
                        <!-- <a href="" class="bg-success"><i class="fa fa-whatsapp"></i></a>
                        <a href="" class="instagram"><i class="fa fa-instagram"></i></a>
                        <a href="http://www.facebook.com/sharer.php?u=https://dumetschool.com" target="_black"><i class="fa-facebook-square"></i></a>
                        <a href="https://twitter.com/share?url=https://dumetschool.com&text=Simple%20Share%20Buttons&hashtags=simplesharebuttons" target="_black" class="twitter"><i class="fa fa-twitter"></i></a>
                        <a href="https://plus.google.com/share?url=https://dumetschool.com" target="_black" class="google"><i class="fa fa-google-plus"></i></a>
                        <a href="" class="bg-secondary"><i class="fa fa-link"></i></a> -->
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Modal Penyaluran -->
              <div class="modal fade" id="modalPenyaluran" tabindex="-1" role="dialog" aria-labelledby="modalPenyaluranLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalPenyaluranLabel">Penyaluran Dana</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form class="form-horizontal form-label-left" action="{{ route('penyaluran-dana.store') }}" method="POST">
                      @csrf
                      <input type="hidden" name="program_donasi_id" value="{{$program_donasi->id}}">
                      <div class="modal-body">
                        <div class="form-group row ">
                          <label class="control-label col-md-3 col-sm-3">Jumlah Penyaluran</label>
                          <div class="col-md-9 col-sm-9 ">
                            <input type="number" class="form-control has-feedback-left" name="jumlah" value="{{old('jumlah')}}" required>
                            <span class="form-control-feedback left">Rp.</span>
                          </div>
                        </div>
                        <div class="form-group row ">
                          <label class="control-label col-md-3 col-sm-3">Keterangan</label>
                          <div class="col-md-9 col-sm-9 ">
                            <textarea class="form-control" rows="3" name="keterangan" required>{{old('keterangan')}}</textarea>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                    </form>
                  </div>
                </div>
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
                <li class="nav-item">
                  <a class="nav-link" id="penyaluran-dana-tab" data-toggle="tab" href="#penyaluran-dana" role="tab" aria-controls="penyaluran-dana" aria-selected="false">Penyaluran Dana</a>
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
                        <p class="mr-4 mt-2 mb-1">{{$komentar->komentar}}</p>
                        <i class="fa fa-heart mx-2"></i>{{$komentar->jumlah_like}} Likes
                        <i class="fa fa-comment mx-2"></i>{{$komentar->data_balas_komentar->count()}} Replay

                        @foreach($komentar->data_balas_komentar as $balas_komentar)
                        <ul class="messages">
                          <li>
                            <img src="/avatar/{{$balas_komentar->user->avatar}}" class="avatar" alt="Avatar">
                            <div class="message_wrapper">
                              <h4 class="heading">{{$balas_komentar->user->nama_lengkap}}</h4>
                              <blockquote class="message">{{$balas_komentar->created_at->diffForhumans()}}</blockquote>
                              <p class="mr-4 mt-2 mb-1">{{$balas_komentar->komentar_balas}}</p>
                              <i class="fa fa-heart mx-2"></i> {{$balas_komentar->jumlah_like}} Likes
                            </div>
                          </li>
                        </ul>
                        @endforeach

                      </div>
                    </li>
                    @endforeach
                  </ul>
                </div>
                <div class="tab-pane fade" id="penyaluran-dana" role="tabpanel" aria-labelledby="penyaluran-dana-tab">
                  <!-- start user projects -->
                  <h4>Total Dana Telah Disalurkan <span class="float-right">{{rupiah($data_penyaluran_dana->sum('jumlah'))}}</span></h4>
                  <p>Berikut adalah detail transaksi pencairan dana :</p>
                  <table class="data table table-striped no-margin">
                    <thead>
                      <tr>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Jumlah Dana</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data_penyaluran_dana as $penyaluran_dana)
                      <tr>
                        <td>{{$penyaluran_dana->created_at->format('d M Y')}}</td>
                        <td>{{$penyaluran_dana->keterangan}}</td>
                        <td>{{rupiah($penyaluran_dana->jumlah)}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <!-- end user projects -->
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