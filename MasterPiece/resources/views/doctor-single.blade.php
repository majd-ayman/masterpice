<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="Orbitor,business,company,agency,modern,bootstrap4,tech,software">
    <meta name="author" content="themefisher.com">

    <title>Masterpiece</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}" />

    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">
    <!-- Icon Font Css -->
    <link rel="stylesheet" href="{{ asset('plugins/icofont/icofont.min.css') }}">
    <!-- Slick Slider  CSS -->
    <link rel="stylesheet" href="{{ asset('plugins/slick-carousel/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/slick-carousel/slick/slick-theme.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<style>
    .star-rating {
        direction: rtl;
        display: flex;
        justify-content: flex-start;
        gap: 5px;
    }

    .star-rating input {
        display: none;
    }

    .star-rating label {
        font-size: 25px;
        color: #ccc;
        cursor: pointer;
        transition: color 0.3s;
    }

    .star-rating input:checked~label,
    .star-rating label:hover,
    .star-rating label:hover~label {
        color: #FFB400;
    }

    .review-stars {
        font-size: 20px;
        color: #FFB400;
    }

    .review-box {
        border: 1px solid #ddd;
        padding: 15px;
        margin-bottom: 10px;
        border-radius: 8px;
        background: #f9f9f9;
    }
</style>

<body id="top">
    @include('partials.header')

    <section class="page-title bg-1">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <span class="text-white">Doctor Details</span>
                        <h1 class="text-capitalize mb-5 text-lg">{{ $doctor->name }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section doctor-single">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="doctor-img-block">
                        <img src="{{ asset('images/team/' . $doctor->image) }}" alt="{{ $doctor->name }}"
                            class="img-fluid w-100">
                        <div class="info-block mt-4">
                            <h4 class="mb-0">{{ $doctor->name }}</h4>
                            <p>{{ $doctor->specialty }}</p>
                         
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 col-md-6">
                    <div class="doctor-details mt-4 mt-lg-0">
                        <h2 class="text-md">Introducing to myself</h2>
                        <div class="divider my-4"></div>
                        <p>{{ $doctor->description }}</p>

                        <a href="{{ route('appointment.form') }}" class="btn btn-main-2 btn-round-full mt-3">Make an
                            Appointment<i class="icofont-simple-right ml-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section doctor-qualification gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title">
                        <h3>My Educational Qualifications</h3>
                        <div class="divider my-4"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="edu-block mb-5">
                        <span class="h6 text-muted">{{ $doctor->educational_qualifications }}</span>
                        <h4 class="mb-3 title-color">{{ $doctor->educational_qualifications1 }}</h4>
                        <p>{{ $doctor->educational_qualifications_description1 }}</p>
                    </div>

                    
                </div>

                <div class="col-lg-6">
                 

                    <div class="edu-block">
                        <span class="h6 text-muted"> {{ $doctor->educational_qualifications }}</span>
                        <h4 class="mb-3 title-color">{{ $doctor->educational_qualifications4 }}</h4>
                        <p>{{ $doctor->educational_qualifications_description4 }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="section doctor-skills">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <h3>My skills</h3>
                    <div class="divider my-4"></div>
                    <p>{{ $doctor->skills }}</p>
                </div>
<div class="col-lg-4">
    <div class="skill-list">
        <h5 class="mb-4">Expertise area</h5>
        <ul class="list-unstyled department-service">
            @foreach(explode(',', $doctor->expertise_area) as $expertise)
                <li><i class="icofont-check mr-2"></i>{{ trim($expertise) }}</li>
            @endforeach
        </ul>
    </div>
</div>


                <div class="col-lg-4">
                    <div class="sidebar-widget gray-bg p-4">
                        <h5 class="mb-4">Working Hours</h5>
                        <ul class="list-unstyled lh-35">
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Monday - Friday</span>
                                <span>{{ $doctor->available_from }} - {{ $doctor->available_to }}</span>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Saturday</span>
                                <span>{{ $doctor->available_from }} - {{ $doctor->available_to }}</span>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Sunday</span>
                                <span>Closed</span>
                            </li>
                        </ul>

                        <div class="sidebar-contatct-info mt-4">
                            <p class="mb-0">Need Urgent Help?</p>
                            <h3 class="text-color-2">{{ $doctor->phone }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    {{-- ////////////////////قسم  التعليقات ///////////////// --}}
    <section class="section doctor-reviews">
      <div class="container">
          <!-- عرض التعليقات -->
          <div class="col-lg-12 mb-5">
              <h4 class="mt-5 text-md">Reviews:</h4>
              @forelse ($doctor->reviews as $review)
                  <div class="review-box">
                      {{-- <p><strong>{{ $review->user->name }}</strong></p> --}}
                      <p>{{ $review->comment }}</p>
                      <div class="review-stars">
                          @for ($i = 1; $i <= 5; $i++)
                              @if ($i <= $review->rating)
                                  <i class="fas fa-star"></i>
                              @else
                                  <i class="far fa-star"></i>
                              @endif
                          @endfor
                      </div>
                      <small class="text-muted">{{ $review->created_at->format('Y-m-d') }}</small>
                  </div>
              @empty
                  <p>No reviews yet.</p>
              @endforelse
  
                <!-- قسم إضافة التعليقات -->
                @if(auth()->check() && $appointment && $appointment->user_id == auth()->id() && $appointment->status == 'completed') 
                    <div class="col-lg-12">
                        <form action="{{ route('reviews.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                            <input type="hidden" name="appointment_id" value="{{ $appointment->id }}">
    
                            <div class="form-group">
                                <label for="comment">Comment:</label>
                                <textarea name="comment" class="form-control" required></textarea>
                            </div>
    
                            <div class="form-group">
                                <label for="rating">Rating:</label>
                                <div class="star-rating">
                                    @for ($i = 5; $i >= 1; $i--)
                                        <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}">
                                        <label for="star{{ $i }}"><i class="fas fa-star"></i></label>
                                    @endfor
                                </div>
                            </div>
    
                            <button type="submit" class="btn btn-primary mt-2">Submit Review</button>
                        </form>
                    </div>
                @else
                    <p>You can only leave a review after completing your appointment.</p>
                @endif
          </div>
      </div>
  </section>

  @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif



    <script>
        document.getElementById('comment-form').addEventListener('submit', function(e) {
            e.preventDefault(); 

            let name = document.getElementById('name').value.trim();
            let email = document.getElementById('mail').value.trim();
            let comment = document.getElementById('comment').value.trim();
            let rating = document.querySelector('input[name="rating"]:checked');

            let isValid = true;
            let errors = [];

            if (name === '') {
                isValid = false;
                errors.push("Please enter your name.");
            }

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (email === '' || !emailRegex.test(email)) {
                isValid = false;
                errors.push("Please enter a valid email.");
            }

            if (comment === '') {
                isValid = false;
                errors.push("Please enter your comment.");
            }

            if (!rating) {
                isValid = false;
                errors.push("Please select a rating.");
            }

            if (!isValid) {
                alert(errors.join("\n"));
                return;
            }

            this.submit(); 
        });
    </script>


    @include('partials.footer')

    <!-- Scripts -->
    <script src="{{ asset('plugins/jquery/jquery.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/counterup/jquery.easing.js') }}"></script>
    <script src="{{ asset('plugins/slick-carousel/slick/slick.min.js') }}"></script>
    <script src="{{ asset('plugins/counterup/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('plugins/shuffle/shuffle.min.js') }}"></script>
    <script src="{{ asset('plugins/counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/contact.js') }}"></script>

    <!-- Google Map -->
    <script src="{{ asset('plugins/google-map/map.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap">
    </script>

</body>

</html>
