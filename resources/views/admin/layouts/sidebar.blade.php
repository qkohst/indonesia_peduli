<div class="col-md-3 left_col menu_fixed">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="{{ route('dashboard') }}" class="site_title"><img src="/landing-page-assets/img/logo-putih.png" alt="" width="45px" height="45px"> <small>Indonesia Peduli</small></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix">
      <div class="profile_pic">
        <img src="/avatar/{{Auth::user()->avatar}}" alt="avatar" class="img-circle profile_img">
      </div>
      <div class="profile_info">
        <span>Welcome,</span>
        <h2>{{Auth::user()->nama_lengkap}}</h2>
      </div>
    </div>
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
          <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> Dashboard</a></li>
          <li><a href="{{ route('kategori-donasi.index') }}"><i class="fa fa-sitemap"></i> Ketegori Donasi</a></li>
          <li><a href="{{ route('program-donasi.index') }}"><i class="fa fa-wheelchair-alt"></i> Program Donasi</a></li>
        </ul>
      </div>

      <div class="menu_section">
        <h3>Pengaturan</h3>
        <ul class="nav side-menu">
          <li><a><i class="fa fa-building"></i> Tentang Kami <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{ route('set-tentang.index') }}">Tentang Indonesia Peduli</a></li>
              <li><a href="{{ route('set-partner.index') }}">Partner Kerjasama</a></li>
              <li><a href="{{ route('set-carakerja.index') }}">Cara Kerja</a></li>
              <li><a href="{{ route('set-anggotatim.index') }}">Anggota Tim</a></li>
            </ul>
          </li>
          <!-- <li><a href="#"><i class="fa fa-user-md"></i> Kontak Kami</a></li> -->

        </ul>
      </div>

    </div>
    <!-- /sidebar menu -->

    <!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
      <a data-toggle="tooltip" data-placement="top" title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Lock">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('logout') }}">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
      </a>
    </div>
    <!-- /menu footer buttons -->
  </div>
</div>