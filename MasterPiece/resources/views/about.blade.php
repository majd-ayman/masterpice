<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="Orbitor,business,company,agency,modern,bootstrap4,tech,software">
    <meta name="author" content="themefisher.com">

    <title>Masterpice</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico" />

    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
    <!-- Icon Font Css -->
    <link rel="stylesheet" href="plugins/icofont/icofont.min.css">
    <!-- Slick Slider  CSS -->
    <link rel="stylesheet" href="plugins/slick-carousel/slick/slick.css">
    <link rel="stylesheet" href="plugins/slick-carousel/slick/slick-theme.css">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body id="top">

    @include('partials.header')



    <section class="page-title bg-1">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <span class="text-white">About Us</span>
                        <h1 class="text-capitalize mb-5 text-lg">About Us</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section about-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <h2 class="title-color">Personal care for your healthy living</h2>
                </div>
                <div class="col-lg-8">
                    <p>Personalized care for your health and well-being. We are here to provide you with the best medical services, from routine check-ups to specialized consultations, ensuring you receive comprehensive healthcare.</p>
                    <img src="images/about/sign.png" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </section>



    <section class="fetaure-page ">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="about-block-item mb-5 mb-lg-0">
                        <img src="images/about/about-1.jpg" alt="" class="img-fluid w-100">
                        <h4 class="mt-3">Healthcare for Kids</h4>
                        <p>Voluptate aperiam esse possimus maxime repellendus, nihil quod accusantium .</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="about-block-item mb-5 mb-lg-0">
                        <img src="images/about/about-2.jpg" alt="" class="img-fluid w-100">
                        <h4 class="mt-3">Medical Counseling</h4>
                        <p>Voluptate aperiam esse possimus maxime repellendus, nihil quod accusantium .</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="about-block-item mb-5 mb-lg-0">
                        <img src="images/about/about-3.jpg" alt="" class="img-fluid w-100">
                        <h4 class="mt-3">Modern Equipments</h4>
                        <p>Voluptate aperiam esse possimus maxime repellendus, nihil quod accusantium .</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="about-block-item">
                        <img src="images/about/about-4.jpg" alt="" class="img-fluid w-100">
                        <h4 class="mt-3">Qualified Doctors</h4>
                        <p>Voluptate aperiam esse possimus maxime repellendus, nihil quod accusantium .</p>
                    </div>
                </div>
            </div>
        </div>
    </section>







    <section class="section awards">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <h2 class="title-color">Our Doctors achievements </h2>
                    <div class="divider mt-4 mb-5 mb-lg-0"></div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="award-img">
                                <img src="images/about/3.png" alt="" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="award-img">
                                <img src="images/about/4.png" alt="" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="award-img">
                                <img src="images/about/1.png" alt="" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="award-img">
                                <img src="images/about/2.png" alt="" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="award-img">
                                <img src="images/about/5.png" alt="" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="award-img">
                                <img src="images/about/6.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <section class="section team">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center">
                        <h2 class="mb-4">Meet Our Specialists</h2>
                        <div class="divider mx-auto my-4"></div>
                        <p>Our team of expert doctors is here to provide you with the best medical care.</p>
                    </div>
                </div>
            </div>
    



            <div class="row">
                @foreach ($doctors as $doctor)
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="team-block mb-5 mb-lg-0">
                            <img src="{{ asset('images/team/' . $doctor->image) }}" alt="{{ $doctor->name }}" class="img-fluid w-100">
                            <div class="content">
                                <h4 class="mt-4 mb-0">{{ $doctor->name }}</h4>
                                <p>{{ $doctor->specialty }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section> 
    @php
    $reviews = $reviews ?? [];
@endphp

    

    <section class="section testimonial">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-6">
                    <div class="section-title">
                        <h2 class="mb-4">What they say about us</h2>
                        <div class="divider my-4"></div>
                    </div>
                </div>
            </div>
    
            <div class="row align-items-center">
                <div class="col-lg-6 testimonial-wrap offset-lg-6">
                    @foreach($reviews as $review)
                        <div class="testimonial-block">
                            <div class="client-info">
                                <h4>{{ $review->rating >= 4 ? 'Amazing service!' : 'Thank you!' }}</h4>
                                <span>{{ $review->user->name ?? 'Anonymous' }}</span>
                            </div>
                            <p>{{ $review->comment }}</p>
                            <i class="icofont-quote-right"></i>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    
    <!-- footer Start -->
    @include('partials.footer')


    <!-- 
    Essential Scripts
    =====================================-->


    <!-- ain jQueryM -->
    <script src="plugins/jquery/jquery.js"></script>
    <!-- Bootstrap 4.3.2 -->
    <script src="plugins/bootstrap/js/popper.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/counterup/jquery.easing.js"></script>
    <!-- Slick Slider -->
    <script src="plugins/slick-carousel/slick/slick.min.js"></script>
    <!-- Counterup -->
    <script src="plugins/counterup/jquery.waypoints.min.js"></script>

    <script src="plugins/shuffle/shuffle.min.js"></script>
    <script src="plugins/counterup/jquery.counterup.min.js"></script>
    <!-- Google Map -->
    <script src="plugins/google-map/map.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap"></script>

    <script src="js/script.js"></script>
    <script src="js/contact.js"></script>

</body>

</html>