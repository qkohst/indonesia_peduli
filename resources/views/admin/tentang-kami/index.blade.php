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
              <div class="clearfix"></div>
            </div>
            <div class="x_content">

              <div class="col-md-7 col-sm-7 ">
                <div class="product-image">
                  <img src="/landing-page-assets/img/{{$tentang_kami->gambar_utama}}" alt="Gambar" />
                </div>
              </div>

              <div class="col-md-5 col-sm-5 " style="border:0px solid #e5e5e5;">
                <h2 class="prod_title">{{$tentang_kami->deksripsi_singkat}}</h2>
                <p>{{$tentang_kami->deksripsi_footer}}</p>
                <ul class="list-unstyled user_data">
                  <li>
                    <i class="fa fa-map-marker user-profile-icon"></i> {{$tentang_kami->alamat}}
                  </li>
                  <li>
                    <i class="fa fa-envelope user-profile-icon"></i> {{$tentang_kami->email}}
                  </li>
                  <li>
                    <i class="fa fa-phone user-profile-icon"></i> {{$tentang_kami->nomor_hp}}
                  </li>
                  <li>
                    <i class="fa fa-facebook user-profile-icon"></i> {{$tentang_kami->facebook}}
                  </li>
                  <li>
                    <i class="fa fa-twitter user-profile-icon"></i> {{$tentang_kami->twitter}}
                  </li>
                  <li>
                    <i class="fa fa-instagram user-profile-icon"></i> {{$tentang_kami->instagram}}
                  </li>
                  <li>
                    <i class="fa fa-youtube user-profile-icon"></i> {{$tentang_kami->youtube}}
                  </li>
                </ul>

                <a href="{{ route('set-tentang.edit', $tentang_kami->id) }}" class="btn btn-success btn-md"><i class="fa fa-edit m-right-xs"></i> Edit Data</a>
              </div>

              <div class="col-md-12 mt-4">
                <p>{{$tentang_kami->deksripsi}}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@include('admin.layouts.footer')