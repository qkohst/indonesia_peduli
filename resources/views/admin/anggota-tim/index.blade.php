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

                                            <form class="form-horizontal form-label-left" action="{{ route('set-anggotatim.store') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group row ">
                                                        <label class="control-label col-md-3 col-sm-3 ">Nama Lengkap</label>
                                                        <div class="col-md-9 col-sm-9 ">
                                                            <input type="text" class="form-control" name="nama_lengkap" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row ">
                                                        <label class="control-label col-md-3 col-sm-3 ">Jabatan</label>
                                                        <div class="col-md-9 col-sm-9 ">
                                                            <input type="text" class="form-control" name="jabatan" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row ">
                                                        <label class="control-label col-md-3 col-sm-3 ">Foto</label>
                                                        <div class="col-md-9 col-sm-9 ">
                                                            <input type="file" name="foto" accept="image/*" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row ">
                                                        <label class="control-label col-md-3 col-sm-3 ">Uraian Tugas</label>
                                                        <div class="col-md-9 col-sm-9 ">
                                                            <textarea class="form-control" rows="3" name="uraian_tugas" required></textarea>
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
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box table-responsive">

                                        <table id="datatable" class="table table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Lengkap</th>
                                                    <th>Jabatan</th>
                                                    <th>Uraian Tugas</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php $no = 0; ?>
                                                @foreach($data_angggota_tim as $anggota_tim)
                                                <?php $no++; ?>
                                                <tr>
                                                    <td>{{$no}}</td>
                                                    <td>{{$anggota_tim->nama_lengkap}}</td>
                                                    <td>{{$anggota_tim->jabatan}}</td>
                                                    <td>{{$anggota_tim->uraian_tugas}}</td>
                                                    <td>
                                                        <form action="{{ route('set-anggotatim.destroy', $anggota_tim->id) }}" method="POST">
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
        </div>
    </div>
</div>

@include('admin.layouts.footer')