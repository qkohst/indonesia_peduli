@include('layouts.landing-page.header')

<section class="page-info-section">
    <div class="container">
        <h2>{{$title}}</h2>
        <div class="site-beradcamb">
            <a href="/">Home</a>
            <span><i class="fa fa-angle-right"></i> {{$title}}</span>
        </div>
    </div>
</section>
<!-- Page info end -->

<!-- ======= F.A.Q Section ======= -->
<section id="faq" class="faq">
    <div class="container">
        <div class="section-title">
            <h3>Yang sering mereka tanyakan tentang Indonesia Peduli</h3>
        </div>

        <?php $no = 0; ?>
        @foreach($data_pertanyaan as $pertanyaan)
        <?php $no++; ?>
        <ul class="faq-list">
            @if($no == 1)
            <li>
                <a data-toggle="collapse" class="" href="#faq{{$no}}">{{$pertanyaan->tanya}} <i class="fa fa-question-circle"></i></a>
                <div id="faq{{$no}}" class="collapse show" data-parent=".faq-list">
                    <p>
                        {{$pertanyaan->jawab}}
                    </p>
                </div>
            </li>
            @else
            <li>
                <a data-toggle="collapse" class="collapsed" href="#faq{{$no}}">{{$pertanyaan->tanya}} <i class="fa fa-question-circle"></i></a>
                <div id="faq{{$no}}" class="collapse" data-parent=".faq-list">
                    <p>
                        {{$pertanyaan->jawab}}
                    </p>
                </div>
            </li>
            @endif
        </ul>
        @endforeach
    </div>
</section><!-- End Frequently Asked Questions Section -->

@include('layouts.landing-page.footer')