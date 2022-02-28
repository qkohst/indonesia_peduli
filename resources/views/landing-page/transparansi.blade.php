@include('layouts.landing-page.header')

<section class="page-info-section">
  <div class="container">
    <h2>{{$title}}</h2>
    <div class="site-beradcamb">
      <a href="/">Donasi</a>
      <span><i class="fa fa-angle-right"></i> {{$title}}</span>
    </div>
  </div>
</section>
<!-- Page info end -->

<!-- Blog section -->
<section class="single-blog-page spad">
  <div class="container">
    <div class="widget-area">
      <div class="row">
        <div class="col-12">
          <h3 class="widget-title">{{$title}}</h3>
          <hr>
          <p>Berikut adalah informasi lengkap transaksi pencairan dana :</p>
          <table class="data table table-striped no-margin">
            <thead>
              <tr>
                <th>Tanggal</th>
                <th>Nama Program</th>
                <th>Jumlah Dana</th>
                <th>Keterangan</th>
              </tr>
            </thead>
            <tbody>
              @foreach($data_penyaluran_dana as $penyaluran_dana)
              <tr>
                <td>{{$penyaluran_dana->created_at->format('d M Y')}}</td>
                <td>{{$penyaluran_dana->program_donasi->judul}}</td>
                <td>{{rupiah($penyaluran_dana->jumlah)}}</td>
                <td>{{$penyaluran_dana->keterangan}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  </div>
</section>
<!-- Blog section end -->

@include('layouts.landing-page.footer')