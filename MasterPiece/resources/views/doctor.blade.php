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
<style>
    .star {
    font-size: 20px;
    color: #ccc; /* لون النجمة الفارغة */
}

.star.filled {
    color: #FFD700; /* لون الذهب للنجمة الممتلئة */
}

    </style>
<body id="top">

{{-- @include('partials.header')  --}}



    <section class="page-title bg-1">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <span class="text-white">All Doctors</span>
                        <h1 class="text-capitalize mb-5 text-lg">Specalized doctors</h1>
                    </div>
                </div>
            </div>
        </div>
    </section> 


    <!-- portfolio -->
     <section class="section doctors">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h2>Doctors</h2>
                        <div class="divider mx-auto my-4"></div>
                        <p>
                            We offer a variety of creative medical services
                            Our skilled doctors provide personalized, high-quality healthcare using advanced techniques.
                        </p>
                    </div>
                </div>
            </div> 
            <!-- الفلاتر -->
  <!-- الفلاتر -->
<div class="col-12 text-center mb-5">
    <div class="btn-group btn-group-toggle" data-toggle="buttons">
        <label class="btn active">
            <input type="radio" name="shuffle-filter" value="all" checked />All Clinics
        </label>

        @foreach ($clinics as $clinic)
            <label class="btn">
                <input type="radio" name="shuffle-filter" value="{{ $clinic->id }}" />{{ $clinic->name }}
            </label>
        @endforeach
    </div>
</div> 


            <!-- قائمة الأطباء -->
         <div class="row" id="doctor-list">
                @foreach ($doctors as $doctor)
                    <div class="col-lg-4 doctor-card" data-clinic="{{ $doctor->clinic_id }}">
                        <div class="card mb-4">
                            <img src="{{ asset('images/team/' . $doctor->image) }}" class="card-img-top" alt="Doctor Image" style="height: 350px; object-fit: cover;">
                            <div class="card-body text-center">
                                <h5 class="card-title">
                                    {{ $doctor->name }}
                                </h5>
                                <p>Specialty: {{ $doctor->specialty }}</p> <!-- عرض التخصص هنا -->
                                <p>Clinic: {{ $doctor->clinic->name }}</p> <!-- عرض اسم العيادة -->
                
                                <!-- عرض عدد النجوم -->
                                <div class="rating">
                                    @for ($i = 0; $i < 5; $i++)
                                        @if ($i < $doctor->average_rating)
                                            <span class="star filled">&#9733;</span> <!-- النجمة المملوءة -->
                                        @else
                                            <span class="star">&#9734;</span> <!-- النجمة الفارغة -->
                                        @endif
                                    @endfor
                                    <div>
                                        
                                        
                                        <a href="/doctor/{{ $doctor->id }}" class="btn btn-primary mt-2">
                                            View Profile
                                        </a>
                                                                            
                                    
                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            
        </div>
        </div>
    </section> 











    <!-- /portfolio -->
     <section class="section cta-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="cta-content">
                        <div class="divider mb-4"></div>
                        <h2 class="mb-5 text-lg">We are pleased to offer you the <span class="title-color">chance to
                                have the healthy</span></h2>
                        <a href="{{route('appointment.form')}}" class="btn btn-main-2 btn-round-full">Get appoinment<i class="icofont-simple-right  ml-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section> 





    <!-- footer Start -->
     @include('partials.footer') 

    



    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const filters = document.querySelectorAll('input[name="shuffle-filter"]');
            const doctors = document.querySelectorAll('.doctor-card');
    
            filters.forEach(filter => {
                filter.addEventListener('click', function () {
                    const selected = this.value;
    
                    // تغيير الشكل النشط للزر
                    filters.forEach(f => f.closest('label').classList.remove('active'));
                    filter.closest('label').classList.add('active');
    
                    // فلترة الأطباء
                    doctors.forEach(card => {
                        const clinicId = card.getAttribute('data-clinic');
    
                        if (selected === 'all' || selected === clinicId) {
                            card.style.display = 'block';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            });
        });
    </script>
    

</body>

</html> 