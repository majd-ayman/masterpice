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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body id="top">

    @include('partials.header')

    <section class="page-title bg-1">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <span class="text-white">Contact Us</span>
                        <h1 class="text-capitalize mb-5 text-lg">Get in Touch</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact form start -->

    <section class="section contact-info pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-6 col-md-6">
                    <div class="contact-block mb-4 mb-lg-0">
                        <i class="icofont-live-support"></i>
                        <h5>Call Us</h5>
                        <a href="https://wa.me/962770467339?text=Hello%20Majd%2C%20I%20would%20like%20to%20ask%20about..." target="_blank" style="text-decoration: none; color: inherit;">
                            +962 770 467 339
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6 col-md-6">
                    <div class="contact-block mb-4 mb-lg-0">
                        <i class="icofont-support-faq"></i>
                        <h5>Email Us</h5>
                        majdaburumman@mail.com
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-md-6">
                    <div class="contact-block mb-4 mb-lg-0">
                        <i class="icofont-location-pin"></i>
                        <h5>Location</h5>
                        University Street, Amman, Jordan
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="contact-form-wrap section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center">
                        <h2 class="text-md mb-2">Contact us</h2>
                        <div class="divider mx-auto my-4"></div>
                        <p class="mb-5">Get in touch with us! Whether you have a question, need support, or just want
                            to say hello, we're here to help. Contact us via phone, email, or visit us.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <form id="contact-form" class="contact__form" method="POST" action="{{ route('contact.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-success contact__msg" style="display: none" role="alert">
                                    Your message was sent successfully.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- Name Field -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">Your Full Name</label>
                                    <input name="name" id="name" type="text" class="form-control"
                                        placeholder="Your Full Name" required>
                                </div>
                            </div>

                            <!-- Email Field -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="email">Your Email Address</label>
                                    <input name="email" id="email" type="email" class="form-control"
                                        placeholder="Your Email Address" required>
                                </div>
                            </div>

                            <!-- Subject Field -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="subject">Your Query Topic</label>
                                    <input name="subject" id="subject" type="text" class="form-control"
                                        placeholder="Your Query Topic" required>
                                </div>
                            </div>

                            <!-- Phone Field -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="phone">Your Phone Number</label>
                                    <input name="phone" id="phone" type="text" class="form-control"
                                        placeholder="Your Phone Number" required>
                                </div>
                            </div>
                        </div>

                        <!-- Message Field -->
                        <div class="form-group-2 mb-4">
                            <label for="message">Your Message</label>
                            <textarea name="message" id="message" class="form-control" rows="8" placeholder="Your Message" required oninput="countWords()"></textarea>
                            <small id="wordCount">Words left: 50</small>
                        </div>
                        <div class="text-center">
                            <input class="btn btn-main btn-round-full" name="submit" type="submit"
                                value="Send Message">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    {{-- googlemap --}}
    <div class="google-map" style="height: 400px;">
        <iframe id="map" width="100%" height="100%" frameborder="0"
            style="border:0; width: 100%; height: 100%;" allowfullscreen="" aria-hidden="false" tabindex="0"
            src="https://www.google.com/maps/embed/v1/place?q=University+Street%2C+Jordan%2C+Amman&key=AIzaSyBCW1JPCuF0HxGWRGYi1EklXTsOcVk0udU">
        </iframe>
    </div>

    <!-- footer Start -->
    @include('partials.footer')

    <!-- Essential Scripts -->
    <script src="plugins/jquery/jquery.js"></script>
    <script src="plugins/bootstrap/js/popper.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/counterup/jquery.easing.js"></script>
    <script src="plugins/slick-carousel/slick/slick.min.js"></script>
    <script src="plugins/counterup/jquery.waypoints.min.js"></script>

    <script src="plugins/shuffle/shuffle.min.js"></script>
    <script src="plugins/counterup/jquery.counterup.min.js"></script>
    <script src="plugins/google-map/map.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap"></script>

    <script src="js/script.js"></script>

    @if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}',
            confirmButtonText: 'Ok'
        });
    </script>
    <script>
        function countWords() {
            let message = document.getElementById('message').value;
            let wordCount = message.trim().split(/\s+/).length;
            if (message.trim() === "") {
                wordCount = 0;
            }

            const maxWords = 50;

            let remainingWords = maxWords - wordCount;

            if (wordCount > maxWords) {
                message = message.trim().split(/\s+/).slice(0, maxWords).join(" ");
                document.getElementById('message').value = message;
                remainingWords = 0; 
            }

            document.getElementById('wordCount').textContent = `Words left: ${remainingWords}`;

            if (wordCount >= maxWords) {
                document.getElementById('message').setAttribute("maxlength", "9999"); 
                document.getElementById('message').disabled = true;
                setTimeout(() => {
                    alert("You have reached the maximum word limit of 50 words.");
                }, 100);
            } else {
                document.getElementById('message').disabled = false; 
            }
        }

        document.getElementById('message').addEventListener('input', countWords);
    </script>
    @endif
</body>

</html>
