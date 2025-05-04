<!-- footer Start -->
<footer class="footer section gray-bg py-3">
	<div class="container">
		<div class="row gy-3 justify-content-between">

			<!-- Get in Touch - Right -->
			<div class="col-lg-4 col-sm-6 order-lg-3 text-lg-end">
				<div class="widget widget-contact mb-3">
					<h5 class="text-capitalize mb-2">Get in Touch</h5>
					<div class="divider mb-2 ms-auto" style="width: 60px;"></div>

					<div class="footer-contact-block mb-3">
						<div class="icon text-lg-end">
							<i class="icofont-email me-2"></i>
							<p class="h6 mb-0 d-inline" style="font-size: 14px;">Support Available 24/7</p>
						</div>
						<h6 class="mt-1 text-lg-end"><a href="mailto:Support@email.com">Support@email.com</a></h6>
					</div>

					<div class="footer-contact-block">
						<div class="icon text-lg-end">
							<i class="icofont-support me-2"></i>
							<p class="h6 mb-0 d-inline" style="font-size: 14px;">Sun to Thu : 08:00 - 22:00</p>
						</div>
						<h6 class="mt-1 text-lg-end">
							<a href="https://wa.me/962770467339" target="_blank">077 046 7339</a>
						</h6>
					</div>
				</div>
			</div>

			<!-- Departments - Center -->
			<div class="col-lg-3 col-sm-6 order-lg-2 text-lg-start">
				<div class="widget mb-3">
					<h5 class="text-capitalize mb-2">Departments</h5>
					<div class="divider mb-3" style="width: 60px;"></div>
					<ul class="list-unstyled lh-lg" style="font-size: 16px;">
						<li><a href="{{ route('department') }}" class="text-decoration-none text-dark">Cardiology</a></li>
						<li><a href="{{ route('department') }}" class="text-decoration-none text-dark">Child Care</a></li>
						<li><a href="{{ route('department') }}" class="text-decoration-none text-dark">Pulmology</a></li>
						<li><a href="{{ route('department') }}" class="text-decoration-none text-dark">Gynecology</a></li>
						<li><a href="{{ route('department') }}" class="text-decoration-none text-dark">Opthomology</a></li>
					</ul>
				</div>
			</div>



			<!-- Logo and About - Left -->
			<div class="col-lg-4 col-sm-6 order-lg-1 text-lg-start">
				<div class="widget mb-3">
					<div class="logo mb-3">
						<img src="{{ asset('images/kjdjdj.png') }}" alt="Logo" height="50">
					</div>
					<p style="font-size: 15px;">
						Calmora – We prioritize your comfort above all else. High-quality medical services in a safe and relaxing environment because your health deserves the best.
					</p>
					<ul class="list-inline footer-socials mt-3">
						<li class="list-inline-item me-2"><a href="https://www.facebook.com/share/15j1onCnkB/"><i class="icofont-facebook"></i></a></li>
						<li class="list-inline-item me-2"><a href="https://www.linkedin.com/in/majd-aburumman-766897350"><i class="icofont-twitter"></i></a></li>
						<li class="list-inline-item"><a href="https://www.linkedin.com/in/majd-aburumman-766897350"><i class="icofont-linkedin"></i></a></li>
					</ul>
				</div>
			</div>
		</div>

		<!-- Footer Bottom -->
		<div class="footer-btm pt-3 mt-3 border-top">
			<div class="row align-items-center justify-content-between">
				<div class="col-lg-6">
					<div class="copyright" style="font-size: 14px;">
						&copy; Reserved to <span class="text-color">Calmora</span> by 
						<a href="https://www.linkedin.com/in/majd-aburumman-766897350" target="_blank">Majd Abu Rumman</a>
					</div>
				</div>
				{{-- <div class="col-lg-6 text-lg-end mt-3 mt-lg-0">
					<form action="#" class="subscribe d-flex align-items-center gap-2 justify-content-lg-end">
						<input type="email" class="form-control form-control-sm" placeholder="Your Email">
						<a href="#" class="btn btn-main-2 btn-sm btn-round-full">Subscribe</a>
					</form>
				</div> --}}
			</div>

			<div class="row mt-3">
				<div class="col text-center">
					<a class="backtop js-scroll-trigger" href="#top">
						<i class="icofont-long-arrow-up fs-5"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
</footer>
