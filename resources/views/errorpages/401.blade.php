<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="/landing-page-assets/img/logo-icon.png" rel="shortcut icon" />
  <title>Indonesia Peduli | {{$title}} </title>

  <!-- Bootstrap -->
  <link href="/admin-assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="/admin-assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="/admin-assets/vendors/nprogress/nprogress.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="/admin-assets/build/css/custom.min.css" rel="stylesheet">

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
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <!-- page content -->
      <div class="col-md-12">
        <div class="col-middle">
          <div class="text-center text-center">
            <h1 class="error-number">401</h1>
            <h1>Unauthorized</h1>
            <h2>Maaf user tidak memiliki akses pada URL yang anda minta.</h2>
            <div class="mid_center">
              <h5>Kembali ke Beranda</h5>
              <a href="{{ route('dashboard') }}" class="btn btn-secondary btn-round btn-lg">Beranda</a>
            </div>
          </div>
        </div>
      </div>
      <!-- /page content -->
    </div>
  </div>

  <!-- jQuery -->
  <script src="/admin-assets/vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="/admin-assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- FastClick -->
  <script src="/admin-assets/vendors/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="/admin-assets/vendors/nprogress/nprogress.js"></script>

  <!-- Custom Theme Scripts -->
  <script src="/admin-assets/build/js/custom.min.js"></script>
</body>

</html>