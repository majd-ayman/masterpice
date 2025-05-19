@include('partials.header')
<!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

<!-- Slider Start -->
<section class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-xl-7">
                <div class="block">
                    <div class="mb-3"></div>
                    <span
                        style="text-transform: uppercase; font-size: 18px; font-weight: bold; letter-spacing: 1px; margin-bottom: 30px; display: inline-block;">
                        Total Health care solution
                    </span>


                    <h1 style="margin-bottom: 50px; margin-top: 12px;">Your most trusted health partner</h1>


                    <div class="btn-container mt-8">
                        <a href="{{ route('appointment.form') }}" target="_blank"
                            class="btn btn-main-2 btn-icon btn-round-full">
                            Make appointment <i class="icofont-simple-right ml-2 mt-2"></i>
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
                        <p class="mb-4 ">Your comfort is our priority — book your appointment online before your visit
                            and enjoy a smooth, stress-free medical experience.

                        </p>
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
    <span>Contact us</span>
    <h4 class="mb-3">0780467339</h4>
    <p>Feel free to contact us during working hours and ask about anything you need. We're here to help you with pleasure.</p>
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

<section class="cta-section">
    <div class="container">
        <div class="cta position-relative">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="counter-stat">
                        <i class="icofont-doctor"></i>
                        <span class="h3 counter" data-target="100">0</span>+
                        <p>Happy People</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="counter-stat">
                        <i class="icofont-flag"></i>
                        <span class="h3 counter" data-target="70">0</span>+
                        <p>Surgery Comepleted</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="counter-stat">
                        <i class="icofont-badge"></i>
                        <span class="h3 counter" data-target="80">0</span>+
                        <p>Expert Doctors</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="counter-stat">
                        <i class="icofont-globe"></i>
                        <span class="h3 counter" data-target="10">0</span>
                        <p>Worldwide Branch</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
  const counters = document.querySelectorAll('.counter');

  const speed = 200; 

  const animateCounters = () => {
    counters.forEach(counter => {
      const updateCount = () => {
        const target = +counter.getAttribute('data-target');
        const count = +counter.innerText;

        const increment = target / speed;

        if (count < target) {
          counter.innerText = Math.ceil(count + increment);
          setTimeout(updateCount, 10);
        } else {
          counter.innerText = target;
        }
      };

      updateCount();
    });
  };

  const section = document.querySelector('.cta-section');
  let hasAnimated = false;

  window.addEventListener('scroll', () => {
    const sectionTop = section.getBoundingClientRect().top;
    const screenHeight = window.innerHeight;

    if (!hasAnimated && sectionTop < screenHeight - 100) {
      animateCounters();
      hasAnimated = true;
    }
  });
</script>















<section class="section service gray-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center">
                <div class="section-title">
                    <h2>Explore Our Specialized Clinics</h2>
                    <div class=" mx-auto my-4"></div>
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
                    <h2>We served over 100+ Patients</h2>
                    <div class="mx-auto my-4"></div>
                    <p>Lets know moreel necessitatibus dolor asperiores illum possimus sint voluptates incidunt
                        molestias nostrum laudantium. Maiores porro cumque quaerat.</p>
                </div>
            </div>
        </div>
    </div>


    {{-- {{dd($reviews)}} --}}





<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <!-- Swiper -->
            <div class="swiper mySwiper" dir="rtl">
                <div class="swiper-wrapper">
                    @foreach ($reviews as $review)
                        <div class="swiper-slide">
                            <div class="testimonial-block style-2 gray-bg p-4">
                                <i class="icofont-quote-right"></i>
                                <div class="client-info">
                                    <h4>{{ $review->title }}</h4>
                                    <span>{{ $review->user->name }}</span>
                                    <p>{{ $review->comment }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>
</div>


</section>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>


@include('partials.footer')

<!-- Swiper JS -->

</body>

</html>
