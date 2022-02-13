<!DOCTYPE html>
<html lang="en">

<head>
  <title>Indonesia Peduli - {{$title}}</title>
  <meta charset="UTF-8">
  <meta name="description" content="Indonesia Peduli">
  <meta name="keywords" content="Indonesia Peduli, Donasi, bencana, berbagi">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Favicon -->
  <link href="/landing-page-assets/img/logo-icon.png" rel="shortcut icon" />

  <!-- Stylesheets -->
  <link rel="stylesheet" href="/landing-page-assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="/landing-page-assets/css/font-awesome.min.css" />
  <link rel="stylesheet" href="/landing-page-assets/css/themify-icons.css" />
  <link rel="stylesheet" href="/landing-page-assets/css/animate.css" />
  <link rel="stylesheet" href="/landing-page-assets/css/owl.carousel.css" />
  <link rel="stylesheet" href="/landing-page-assets/css/style.css" />

  <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
  <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-hGGBcYoxiPjVk7eT"></script>
  <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
</head>

<body>
  <!-- Page Preloder -->
  <div id="preloder">
    <div class="loader"></div>
  </div>

  <!-- Header section -->
  <header class="header-section clearfix">
    <div class="container">
      <a href="index.html" class="site-logo">
        <img src="/landing-page-assets/img/logo.png" alt="">
      </a>
      <div class="responsive-bar"><i class="fa fa-bars"></i></div>
      <a href="" class="site-btn">Donasi Sekarang</a>
      <nav class="main-menu">
        <ul class="menu-list">
          <li><a href="/">Donasi</a></li>
          <li><a href="">Galang Dana</a></li>
          <li><a href="">Donasi Saya</a></li>
          <li><a href="">Tentang Kami</a></li>
          <li><a href="">Contact</a></li>

          @if (Auth::check())
          <li><a href="{{ route('member.profile') }}"><i class="fa fa-user"></i> {{Auth::user()->nama_lengkap}}</a></li>
          @else
          <li><a href="{{ route('login') }}">Masuk</a></li>
          @endif

        </ul>
      </nav>
    </div>

    <!-- Crisp Chat -->
    <script type="text/javascript">
      window.$crisp = [];
      window.CRISP_WEBSITE_ID = "0be5779f-78ee-4d9d-aa9e-cd82ed81e030";
      (function() {
        d = document;
        s = d.createElement("script");
        s.src = "https://client.crisp.chat/l.js";
        s.async = 1;
        d.getElementsByTagName("head")[0].appendChild(s);
      })();
    </script>
  </header>
  <!-- Header section end -->