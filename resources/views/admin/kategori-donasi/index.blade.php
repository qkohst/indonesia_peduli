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
                <button type="button" class="btn btn-sm btn-primary mr-0" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i> Tambah</button>

                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                      <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Tambah {{$title}}</h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                      </div>

                      <form class="form-horizontal form-label-left" action="{{ route('kategori-donasi.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                          <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Nama Kategori</label>
                            <div class="col-md-9 col-sm-9 ">
                              <input type="text" class="form-control" name="nama_kategori">
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

              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">

              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 0; ?>
                  @foreach($data_kategori as $kategori)
                  <?php $no++; ?>
                  <tr>
                    <th scope="row">{{$no}}</th>
                    <td>{{$kategori->nama_kategori}}</td>
                    <td>
                      <form action="{{ route('kategori-donasi.destroy', $kategori->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm mt-1" onclick="return confirm('Hapus {{$title}} ?')">
                          <i class="fa fa-trash"></i> Hapus
                        </button>
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

@include('admin.layouts.footer')