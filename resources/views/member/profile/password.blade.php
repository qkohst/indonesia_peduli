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
                        <form class="contact-form" method="post" action="{{ route('member.profile.update_password') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="check-form" type="password" name="password_lama" placeholder="Password Lama">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="check-form" type="password" name="password_baru" placeholder="Password Baru">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="check-form" type="password" name="konfirmasi_password" placeholder="Konfirmasi Password">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button class="site-btn sb-gradients mt-3 mr-3" type="submit">Ganti Password</button>
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