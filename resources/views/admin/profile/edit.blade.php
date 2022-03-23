@include('admin.layouts.header')
@include('admin.layouts.sidebar')
@include('admin.layouts.top-nav')

<!-- page content -->
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

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form class="contact-form" method="post" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="item form-group">
                                <label class="col-form-label col-md-2 col-sm-2">Nama Lengkap
                                </label>
                                <div class="col-md-10 col-sm-10 ">
                                    <input type="text" name="nama_lengkap" class="form-control" value="{{$profile->nama_lengkap}}" required>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-2 col-sm-2">Jenis Kelamin</label>
                                <div class="col-md-10 col-sm-10 ">
                                    <label class="mr-2">
                                        <input type="radio" value="L" name="jenis_kelamin" @if ($profile->jenis_kelamin =='L' ) checked @endif> Laki-Laki
                                    </label>
                                    <label>
                                        <input type="radio" value="P" name="jenis_kelamin" @if ($profile->jenis_kelamin =='P' ) checked @endif> Perempuan
                                    </label>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-2 col-sm-2">Nomor HP
                                </label>
                                <div class="col-md-10 col-sm-10 ">
                                    <input type="number" name="nomor_hp" class="form-control" value="{{$profile->nomor_hp}}" required>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-2 col-sm-2">Foto Profile
                                </label>
                                <div class="col-md-10 col-sm-10 ">
                                    <input type="file" name="foto_profile" accept="image/*">
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-2">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                    <a class="btn btn-secondary" href="{{ route('admin.profile.index') }}">Batal</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

@include('admin.layouts.footer')