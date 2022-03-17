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
                                <li><a class="close-link" href="{{ route('set-tentang.index') }}"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            <form class="form-horizontal form-label-left" action="{{ route('set-tentang.update', $tentang_kami->id) }}" method="POST" enctype="multipart/form-data">
                                {{ method_field('PATCH') }}
                                @csrf
                                <div class="form-group row ">
                                    <label class="control-label col-md-2 col-sm-2 ">Deskripsi Singkat</label>
                                    <div class="col-md-10 col-sm-10 ">
                                        <input type="text" class="form-control" name="deksripsi_singkat" value="{{$tentang_kami->deksripsi_singkat}}">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-2 col-sm-2 ">Deskripsi Footer</label>
                                    <div class="col-md-10 col-sm-10 ">
                                        <textarea class="form-control" rows="2" name="deksripsi_footer" required>{{$tentang_kami->deksripsi_footer}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-2 col-sm-2">Deskripsi Utama</label>
                                    <div class="col-md-10 col-sm-10 ">
                                        <textarea class="form-control" rows="5" name="deksripsi_utama" required>{{$tentang_kami->deksripsi}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-2 col-sm-2 ">Alamat</label>
                                    <div class="col-md-10 col-sm-10 ">
                                        <input type="text" class="form-control" name="alamat" value="{{$tentang_kami->alamat}}">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-2 col-sm-2 ">Email</label>
                                    <div class="col-md-10 col-sm-10 ">
                                        <input type="text" class="form-control" name="email" value="{{$tentang_kami->email}}">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-2 col-sm-2 ">Nomor HP</label>
                                    <div class="col-md-10 col-sm-10 ">
                                        <input type="text" class="form-control" name="nomor_hp" value="{{$tentang_kami->nomor_hp}}">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-2 col-sm-2 ">Facebook</label>
                                    <div class="col-md-10 col-sm-10 ">
                                        <input type="text" class="form-control" name="facebook" value="{{$tentang_kami->facebook}}">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-2 col-sm-2 ">Twitter</label>
                                    <div class="col-md-10 col-sm-10 ">
                                        <input type="text" class="form-control" name="twitter" value="{{$tentang_kami->twitter}}">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-2 col-sm-2 ">Instagram</label>
                                    <div class="col-md-10 col-sm-10 ">
                                        <input type="text" class="form-control" name="instagram" value="{{$tentang_kami->instagram}}">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="control-label col-md-2 col-sm-2 ">Youtube</label>
                                    <div class="col-md-10 col-sm-10 ">
                                        <input type="text" class="form-control" name="youtube" value="{{$tentang_kami->youtube}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-2 col-sm-2">Gambar Utama</label>
                                    <div class="col-md-10 col-sm-10">
                                        <input type="file" name="gambar_utama" accept="image/*">
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 offset-md-2">
                                        <a href="{{ route('set-tentang.index') }}" class="btn btn-danger">Batal</a>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
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