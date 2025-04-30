@include('partials.header')




<!-- Slider Start -->
<section class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-xl-7">
                <div class="block">
                    <div class="divider mb-3"></div>
                    <span class="text-uppercase text-sm letter-spacing ">Total Health care solution</span>
                    <h1 class="mb-3 mt-3">Your most trusted health partner</h1>

                    <p class="mb-4 pr-5">A repudiandae ipsam labore ipsa voluptatum quidem quae laudantium quisquam
                        aperiam maiores sunt fugit, deserunt rem suscipit placeat.</p>
                    <div class="btn-container ">
                        <a href="{{ route('appointment.form') }}" target="_blank"
                            class="btn btn-main-2 btn-icon btn-round-full">
                            Make appointment <i class="icofont-simple-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="features">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="feature-block d-lg-flex">
                    <div class="feature-item mb-5 mb-lg-0">
                        <div class="feature-icon mb-4">
                            <i class="icofont-surgeon-alt"></i>
                        </div>
                        <span>24 Hours Service</span>
                        <h4 class="mb-3">Online Appoinment</h4>
                        <p class="mb-4">Get ALl time support for emergency.We have introduced the principle of family
                            medicine.</p>
                        <a href="{{ route('appointment.form') }}" class="btn btn-main btn-round-full">Make an
                            Appointment</a>
                    </div>

                    <div class="feature-item mb-5 mb-lg-0">
                        <div class="feature-icon mb-4">
                            <i class="icofont-ui-clock"></i>
                        </div>
                        <span>Timing schedule</span>
                        <h4 class="mb-3">Working Hours</h4>
                        <ul class="w-hours list-unstyled">
                            <li class="d-flex justify-content-between">Sun - Tue : <span>8:00 AM - 1:00 PM</span></li>
                            <li class="d-flex justify-content-between">Wed - Thu : <span>8:00 AM - 1:00 PM</span></li>
                            <li class="d-flex justify-content-between">Fri - Sat : <span>Closed</span></li>

                        </ul>
                    </div>

                    <div class="feature-item mb-5 mb-lg-0">
                        <div class="feature-icon mb-4">
                            <i class="icofont-support"></i>
                        </div>
                        <span>Emegency Cases</span>
                        <h4 class="mb-3">0780467339</h4>
                        <p>We're always here for you in case of emergency – don’t hesitate to reach out whenever you
                            need us.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="section about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 col-sm-6">
                <div class="about-img">
                    <img src="images/about/img-1.jpg" alt="" class="img-fluid">
                    <img src="images/about/img-2.jpg" alt="" class="img-fluid mt-4">
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="about-img mt-4 mt-lg-0">
                    <img src="images/about/img-3.jpg" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="about-content pl-4 mt-4 mt-lg-0">
                    <h2 class="title-color">Personal care <br>& healthy living</h2>
                    <p class="mt-4 mb-5">We are dedicated to offering exceptional medical services focused on
                        personalized care and promoting a healthy lifestyle. Our team of experts works tirelessly to
                        provide tailored treatment plans that prioritize your well-being and long-term health.</p>

                    <a href="{{ route('service') }}" class="btn btn-main-2 btn-round-full btn-icon">Services<i
                            class="icofont-simple-right ml-3"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="cta-section ">
    <div class="container">
        <div class="cta position-relative">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="counter-stat">
                        <i class="icofont-doctor"></i>
                        <span class="h3">58</span>k
                        <p>Happy People</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="counter-stat">
                        <i class="icofont-flag"></i>
                        <span class="h3">700</span>+
                        <p>Surgery Comepleted</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="counter-stat">
                        <i class="icofont-badge"></i>
                        <span class="h3">40</span>+
                        <p>Expert Doctors</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="counter-stat">
                        <i class="icofont-globe"></i>
                        <span class="h3">20</span>
                        <p>Worldwide Branch</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="section service gray-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center">
                <div class="section-title">
                    <h2>Explore Our Specialized Clinics</h2>
                    <div class="divider mx-auto my-4"></div>
                    <p>Our medical center provides comprehensive care through a variety of specialized clinics, ensuring
                        the highest standards of treatment with a focus on patient comfort and safety.</p>
                </div>
            </div>
        </div>


        <div class="row">
            @foreach ($clinics as $clinic)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="service-item mb-4">
                        <div class="icon d-flex align-items-center">
                            <i class="{{ $clinic->icon }} text-lg"></i>
                            <h4 class="mt-3 mb-3">{{ $clinic->name }}</h4>
                        </div>
                        <div class="content">
                            <p class="mb-4">{{ $clinic->description }}</p>
                            <p class="mb-2">
                                <i class="icofont-phone" style="color: red; margin-right: 8px;"></i>
                                <strong>Contact:</strong>
                                <a href="https://wa.me/{{ $clinic->contact_number }}" target="_blank">
                                    {{ $clinic->contact_number }}
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>




    </div>



</section>


{{--
	 <section class="section appoinment">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6 ">
					<div class="appoinment-content">
						<img src="images/about/img-3.jpg" alt="" class="img-fluid">
						<div class="emergency">
							<h2 class="text-lg"><i class="icofont-phone-circle text-lg"></i>0770467339</h2>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-10 ">
					<div class="appoinment-wrap mt-5 mt-lg-0">
						<h2 class="mb-2 title-color">Book appoinment</h2>
						<p class="mb-4">Choose the clinic, doctor, and time for your appointment.</p>
							<form id="#" class="appoinment-form" method="post" action="#">
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<select class="form-control" id="exampleFormControlSelect1">
									<option>Choose Department</option>
									<option>Software Design</option>
									<option>Development cycle</option>
									<option>Software Development</option>
									<option>Maintenance</option>
									<option>Process Query</option>
									<option>Cost and Duration</option>
									<option>Modal Delivery</option>
									</select>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<select class="form-control" id="exampleFormControlSelect2">
									<option>Select Doctors</option>
									<option>Software Design</option>
									<option>Development cycle</option>
									<option>Software Development</option>
									<option>Maintenance</option>
									<option>Process Query</option>
									<option>Cost and Duration</option>
									<option>Modal Delivery</option>
									</select>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="form-group">
									<input name="date" id="date" type="text" class="form-control" placeholder="dd/mm/yyyy">
								</div>
							</div>

							<div class="col-lg-6">
								<div class="form-group">
									<input name="time" id="time" type="text" class="form-control" placeholder="Time">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<input name="name" id="name" type="text" class="form-control" placeholder="Full Name">
								</div>
							</div>

							<div class="col-lg-6">
								<div class="form-group">
									<input name="phone" id="phone" type="Number" class="form-control" placeholder="Phone Number">
								</div>
							</div>
						</div>
						<div class="form-group-2 mb-4">
							<textarea name="message" id="message" class="form-control" rows="6" placeholder="Your Message"></textarea>
						</div>

						{{-- <a class="btn btn-main btn-round-full" href="{{ route('appointment') }}">Make Appointment <i class="icofont-simple-right ml-2"></i></a> --}}
</form>
</div>
</div>
</div>
</div>
</section>



<section class="section testimonial-2 gray-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="section-title text-center">
                    <h2>We served over 5000+ Patients</h2>
                    <div class="divider mx-auto my-4"></div>
                    <p>Lets know moreel necessitatibus dolor asperiores illum possimus sint voluptates incidunt
                        molestias nostrum laudantium. Maiores porro cumque quaerat.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
		<div class="row align-items-center">
			<div class="col-lg-12 testimonial-wrap-2">
				
				{{-- @foreach($reviews as $review)
					<div class="testimonial-block style-2 gray-bg">
						<i class="icofont-quote-right"></i>
	
						<div class="testimonial-thumb">
							<!-- إذا كان عندك صورة المستخدم، استخدمها هنا -->
							<img src="{{ $review->user->profile_picture }}" alt="Client Image" class="img-fluid">
						</div>
	
						<div class="client-info">
							<h4>{{ $review->title }}</h4> <!-- هنا عنوان التعليق -->
							<span>{{ $review->user->name }}</span> <!-- هنا اسم المستخدم -->
							<p>
								{{ $review->comment }} <!-- هنا نص التعليق -->
							</p>
						</div>
					</div>
				@endforeach --}}
	
			</div>
		</div>
	</div>
	



</section> 



@include('partials.footer')


</body>

</html>
