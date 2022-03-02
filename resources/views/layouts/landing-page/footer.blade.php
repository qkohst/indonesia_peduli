	<!-- Footer section -->
	<footer class="footer-section">
		<div class="container">
			<div class="row spad">
				<div class="col-md-6 col-lg-4 footer-widget">
					<img src="/landing-page-assets/img/logo.png" class="mb-4" alt="">
					<p>Indonesia Peduli adalah situs web yang dibangun khusus untuk menggalang dana bantuan kesehatan dan donasi secara online</p>
					<span>
						Jalan Salihara No. 41A, Pasar Minggu, Jakarta Selatan <a href="#" target="_blank">support@wecare.id</a>
					</span>
				</div>

				<div class="col-md-6 col-lg-3 offset-lg-1 footer-widget">
					<h5 class="widget-title">Menu Utama</h5>
					<ul>
						<li><a href="/">Donasi</a></li>
						<li><a href="{{ route('donasi-saya.index') }}">Donasi Saya</a></li>
						<li><a href="{{ route('home.transparansi') }}">Transparansi</a></li>
						<li><a href="{{ route('tentang-kami.index') }}">Tentang Kami</a></li>
						<li><a href="#">Kontak Kami</a></li>
					</ul>
				</div>
				<div class="col-md-6 col-lg-3 footer-widget">
					<h5 class="widget-title">Ikuti Kami</h5>
					<div class="social">
						<a href="" class="bg-success"><i class="fa fa-whatsapp"></i></a>
						<a href="" class="facebook"><i class="fa fa-facebook"></i></a>
						<a href="" class="twitter"><i class="fa fa-twitter"></i></a>
						<a href="" class="instagram"><i class="fa fa-instagram"></i></a>
						<a href="" class="bg-danger"><i class="fa fa-youtube"></i></a>
					</div>
				</div>
			</div>
			<div class="footer-bottom">
				<div class="row">
					<div class="col-lg-4 store-links text-center text-lg-left pb-3 pb-lg-0">
						<a href=""><img src="/landing-page-assets/img/appstore.png" alt="" class="mr-2"></a>
						<a href=""><img src="/landing-page-assets/img/playstore.png" alt=""></a>
					</div>
					<div class="col-lg-8 text-center text-lg-right">
						<ul class="footer-nav">
							<li><a href="">Terms of Use</a></li>
							<li><a href="">Privacy Policy </a></li>
							<li>
								<a href="">
									Copyright &copy;<script>
										document.write(new Date().getFullYear());
									</script> Qkoh St | Template by <a href="https://colorlib.com" target="_blank">Colorlib</a>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</footer>


	<!--====== Javascripts & Jquery ======-->
	@include('sweetalert::alert')
	<script src="/landing-page-assets/js/bootstrap.js"></script>
	<script src="/landing-page-assets/js/jquery-3.2.1.min.js"></script>
	<script src="/landing-page-assets/js/owl.carousel.min.js"></script>
	<script src="/landing-page-assets/js/main.js"></script>

	</body>

	</html>