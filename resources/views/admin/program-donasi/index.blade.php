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

      <div class="row" style="display: block;">
        <div class="col-md-12 col-sm-12  ">
          <div class="x_panel">
            <div class="x_title">
              <h2>{{$title}}</h2>
              <ul class="nav navbar-right panel_toolbox">
                <a href="{{ route('program-donasi.create') }}" class="btn btn-sm btn-primary mr-0"><i class="fa fa-plus"></i> Tambah</a>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="row">
                <div class="col-sm-12">
                  <div class="card-box table-responsive">

                    <table id="datatable" class="table table-hover" style="width:100%">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Judul Donasi</th>
                          <th>Jenis Kategori</th>
                          <th>Deskripsi Singkat</th>
                          <th>Kebutuhan Donasi</th>
                          <th>Donasi Terkumpul</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php $no = 0; ?>
                        @foreach($data_program_donasi as $program_donasi)
                        <?php $no++; ?>
                        <tr>
                          <td>{{$no}}</td>
                          <td>{{$program_donasi->judul}}</td>
                          <td>{{$program_donasi->kategori_donasi->nama_kategori}}</td>
                          <td>{{$program_donasi->deskripsi}}</td>
                          <td>{{rupiah($program_donasi->kebutuhan_dana)}}</td>
                          <td>Rp.xxxx</td>
                          <td>
                            <form action="{{ route('program-donasi.destroy', $program_donasi->id) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              <div class="btn-group">
                                <a href="{{ route('program-donasi.show', $program_donasi->id) }}" class="btn btn-primary btn-sm">Detail</a>
                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item" href="{{ route('program-donasi.edit', $program_donasi->id) }}">Edit</a>
                                  <button type="submit" class="dropdown-item" onclick="return confirm('Hapus {{$title}} ?')">Hapus</button>
                                </div>
                              </div>
                            </form>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@include('admin.layouts.footer')