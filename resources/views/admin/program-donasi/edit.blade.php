@include('admin.layouts.header')
@include('admin.layouts.sidebar')
@include('admin.layouts.top-nav')

<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>{{$title}}</h3>
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
              <br />
              <form class="form-horizontal form-label-left" action="{{ route('program-donasi.update', $program_donasi->id) }}" method="POST" enctype="multipart/form-data">
                {{ method_field('PATCH') }}
                @csrf
                <div class="form-group row ">
                  <label class="control-label col-md-2 col-sm-2 ">Judul Donasi</label>
                  <div class="col-md-10 col-sm-10 ">
                    <input type="text" class="form-control" name="judul" value="{{$program_donasi->judul}}" readonly>
                  </div>
                </div>
                <div class="form-group row ">
                  <label class="control-label col-md-2 col-sm-2 ">Kategori</label>
                  <div class="col-md-10 col-sm-10 ">
                    <input type="text" class="form-control" name="judul" value="{{$program_donasi->kategori_donasi->nama_kategori}}" readonly>
                  </div>
                </div>
                <div class="form-group row ">
                  <label class="control-label col-md-2 col-sm-2">Deskripsi Singkat</label>
                  <div class="col-md-10 col-sm-10 ">
                    <textarea class="form-control" rows="2" name="deskripsi" required>{{$program_donasi->deskripsi}}</textarea>
                  </div>
                </div>
                <div class="form-group row ">
                  <label class="control-label col-md-2 col-sm-2">Kebutuhan Dana</label>
                  <div class="col-md-10 col-sm-10 ">
                    <input type="number" class="form-control has-feedback-left" name="kebutuhan_dana" value="{{$program_donasi->kebutuhan_dana}}" required>
                    <span class="form-control-feedback left">Rp.</span>
                  </div>
                </div>
                <div class="form-group row ">
                  <label class="control-label col-md-2 col-sm-2">Batas Akhir Donasi</label>
                  <div class="col-md-10 col-sm-10 ">
                    <input type="date" class="form-control" name="batas_akhir_donasi" value="{{$program_donasi->batas_akhir_donasi->format('Y-m-d')}}" required>
                  </div>
                </div>
                <div class="form-group row ">
                  <label class="control-label col-md-2 col-sm-2">Cerita/Kisah</label>
                  <div class="col-md-10 col-sm-10 ">
                    <textarea class="ckeditor" id="ckedtor" name="kisah" required>{{$program_donasi->kisah}}</textarea>
                  </div>
                </div>

                <div class="ln_solid"></div>
                <div class="item form-group">
                  <div class="col-md-6 col-sm-6 offset-md-2">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('program-donasi.index') }}" class="btn btn-danger">Batal</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@include('admin.layouts.footer')