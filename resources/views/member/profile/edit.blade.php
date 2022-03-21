@include('layouts.landing-page.header')

<!-- Page info section -->
<section class="page-info-section">
    <div class="container">
        <h2>{{$title}}</h2>
        <div class="site-beradcamb">
            <a href="{{ route('member.profile.index') }}">Profile</a>
            <span><i class="fa fa-angle-right"></i> {{$title}}</span>
        </div>
    </div>
</section>
<!-- Page info end -->

<!-- About section -->
<section class="about-section spad">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="widget-area">
                    <div class="widget">
                        <h4 class="widget-title">Profile</h4>
                        <ul>
                            <li><a href="{{ route('member.profile.edit') }}">Edit Profile</a></li>
                            <li><a href="{{ route('member.profile.password') }}">Ganti Password</a></li>
                            <li><a href="{{ route('logout') }}">Keluar/Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="widget-area">
                    <div class="widget">
                        <h4 class="widget-title">{{$title}}</h4>
                        <form class="contact-form" method="post" action="{{ route('member.profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="check-form" type="text" name="nama_lengkap" placeholder="Nama Lengkap" value="{{$profile->nama_lengkap}}">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <h5 class="mb-3">Jenis Kelamin</h5>
                                    <div class="contact-type">
                                        <label class="ct-label">Laki-Laki
                                            <input type="radio" name="jenis_kelamin" value="L" @if ($profile->jenis_kelamin =='L' ) checked @endif>
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="ct-label">Perempuan
                                            <input type="radio" name="jenis_kelamin" value="P" @if ($profile->jenis_kelamin =='P' ) checked @endif>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="check-form" type="number" name="nomor_hp" placeholder="Nomor HP" value="{{$profile->nomor_hp}}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <h5 class="mb-3">Foto Profile</h5>
                                    <input type="file" name="foto_profile" accept="image/*">
                                </div>
                                <div class="col-md-12">
                                    <button class="site-btn sb-gradients mt-3 mr-3" type="submit">Simpan</button>
                                    <a href="{{ route('member.profile.index') }}" class="site-btn sb-gradients sbg-line mt-2">Batal</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- About section end -->

@include('layouts.landing-page.footer')