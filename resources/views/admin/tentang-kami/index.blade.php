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
              <!-- <ul class="nav navbar-right panel_toolbox">
                <a href="{{ route('program-donasi.create') }}" class="btn btn-sm btn-primary mr-0"><i class="fa fa-plus"></i> Tambah</a>
              </ul> -->
              <div class="clearfix"></div>
            </div>
            <div class="x_content">

              <div class="col-md-7 col-sm-7 ">
                <div class="product-image">
                  <img src="/landing-page-assets/img/about-img.png" alt="Gambar" />
                </div>
              </div>

              <div class="col-md-5 col-sm-5 " style="border:0px solid #e5e5e5;">
                <h2 class="prod_title">Indonesia Peduli</h2>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero, aliquid id tempore nobis dignissimos dolorum numquam corrupti sit voluptas eligendi blanditiis, inventore laudantium non perferendis, natus voluptatem tenetur ipsum labore!</p>

                <ul class="list-unstyled user_data">
                  <li>
                    <i class="fa fa-map-marker user-profile-icon"></i> San Francisco, California, USA
                  </li>
                  <li>
                    <i class="fa fa-envelope user-profile-icon"></i> kukohsantoso013@gmail.com
                  </li>
                  <li>
                    <i class="fa fa-phone user-profile-icon"></i> 085232077932
                  </li>
                  <li>
                    <i class="fa fa-facebook user-profile-icon"></i> qkohst
                  </li>
                  <li>
                    <i class="fa fa-twitter user-profile-icon"></i> qkohst
                  </li>
                  <li>
                    <i class="fa fa-instagram user-profile-icon"></i> qkohst
                  </li>
                  <li>
                    <i class="fa fa-youtube user-profile-icon"></i> qkohst
                  </li>
                </ul>

                <a href="#" class="btn btn-success btn-md"><i class="fa fa-edit m-right-xs"></i> Edit Data</a>
              </div>

              <div class="col-md-12 mt-4">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae veritatis facere, ipsa odit voluptatibus perferendis architecto neque. Incidunt accusantium maxime cupiditate velit nam adipisci, debitis, iure vel aliquam ipsa sapiente?</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@include('admin.layouts.footer')