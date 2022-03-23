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
                        <div class="col-md-3 col-sm-4  profile_left">
                            <div class="profile_img">
                                <div id="crop-avatar">
                                    <img class="img-responsive avatar-view" src="/avatar/{{Auth::user()->avatar}}" alt="Avatar" height="250 px">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-8 ">
                            <h3>{{Auth::user()->nama_lengkap}}</h3>

                            <ul class="list-unstyled user_data">
                                <li><i class="fa fa-envelope user-profile-icon"></i> {{Auth::user()->email}}
                                </li>

                                <li>
                                    <i class="fa fa-phone user-profile-icon"></i> {{Auth::user()->nomor_hp}}
                                </li>

                                <li class="m-top-xs">
                                    <i class="fa fa-transgender user-profile-icon"></i>
                                    @if(Auth::user()->jenis_kelamin == 'L')
                                    Laki-laki
                                    @else
                                    Perempuan
                                    @endif
                                </li>
                            </ul>

                            <a class="btn btn-success" href="{{ route('admin.profile.edit') }}"><i class="fa fa-edit m-right-xs"></i> Edit Profile</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

@include('admin.layouts.footer')