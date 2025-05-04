<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Book an appointment easily.">
    <title>Masterpiece - Book an Appointment</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/icofont/icofont.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/appointment.js') }}" defer></script>
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

</head>


<body id="top">

    @include('partials.header')
<style>
    .swal2-confirm {
        background-color: #e12454 !important;
        color: white;
        border: none;
    }

    .swal2-confirm:hover {
        background-color: #d11b4d !important;
    }

    .no-spinners::-webkit-inner-spin-button,
    .no-spinners::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .no-spinners {
        -moz-appearance: textfield;
    }

 .form-control {
        background-color: #f5f5f5; 
        border-color: #e0e0e0;     
        color: #333;               
    }

    .form-control:focus {
        background-color: #f5f5f5;
        border-color: #e12454;     
        color: #333;
    }

    #appointment_date,
    #time_slots {
        background-color: #f5f5f5;
        border-color: #e0e0e0;
    }

    .swal2-confirm {
        background-color: #e12454 !important;
        color: white;
        border: none;
    }

    .swal2-confirm:hover {
        background-color: #d11b4d !important;
    }

    .no-spinners::-webkit-inner-spin-button,
    .no-spinners::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .no-spinners {
        -moz-appearance: textfield;
    }

    
</style>
    <section class="page-title bg-1">
        <div class="overlay"></div>
        <div class="container text-center">
            <span class="text-white">Book your Seat</span>
            <h1 class="text-capitalize mb-5 text-lg">Appointment</h1>
        </div>
    </section>

    <section class="appointment section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="mt-3">
                        <div class="feature-icon mb-3">
                            <i class="icofont-support text-lg"></i>
                        </div>
                        <span class="h3">Call for an Emergency Service!</span>
                        <h2 class="text-color mt-3">077 131 0650</h2>
                    </div>
                </div>




                <div class="col-lg-8">
                    <div class="appointment-wrap mt-5 mt-lg-0 pl-lg-5">
                        <h2 class="mb-2 title-color">Book an Appointment</h2>
                        <p class="mb-4">Choose the clinic, doctor, and time for your appointment.</p>


                        @if (session('success'))
                            <script>
                                Swal.fire({
                                    title: 'Success!',
                                    text: "{{ session('success') }}",
                                    icon: 'success',
                                    confirmButtonText: 'OK',
                                    customClass: {
                                        confirmButton: 'btn-success'
                                    }
                                });
                            </script>
                        @endif

                        @if (session('error'))
                            <script>
                                Swal.fire({
                                    title: 'Error!',
                                    text: "{{ session('error') }}",
                                    icon: 'error',
                                    confirmButtonText: 'OK',
                                    customClass: {
                                        confirmButton: 'btn-danger'
                                    }
                                });
                            </script>
                        @endif




                        <form id="appointment-form" method="POST" action="{{ route('appointment.create') }}">
                            @csrf
                            <div class="row">
                                <!-- Clinic Selection -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="clinic_id">Choose Clinic :</label>
                                        <select id="clinic_id" name="clinic_id" class="form-control" required>
                                            <option value="">Choose Clinic</option>
                                            @foreach ($clinics as $clinic)
                                                <option value="{{ $clinic->id }}">{{ $clinic->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                        
                                <!-- Doctor Selection -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="doctor_id">Select Doctor :</label>
                                        <select id="doctor_id" name="doctor_id" class="form-control" required>
                                            <option value="">Select Doctor</option>
                                        </select>
                                        <input type="hidden" id="doctor_id_hidden" name="doctor_id" value="">
                                    </div>
                                </div>
                        
                                <!-- Date Picker -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="appointment_date">Choose Date :</label>
                                        <input name="appointment_date" id="appointment_date" class="form-control" placeholder="Select a date" required>
                                    </div>
                                </div>
                        
                                <!-- Time Slots -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="time_slots">Select Time :</label>
                                        <select id="time_slots" name="appointment_time" class="form-control" required>
                                            <option value="">Select Time</option>
                                        </select>
                                    </div>
                                </div>
                        
                                <!-- Full Name -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Full Name :</label>
                                        <input id="name" name="name" type="text" class="form-control" placeholder="Full Name" required>
                                        <small class="text-danger name-error"></small>
                                    </div>
                                </div>
                        
                                <!-- Phone Number -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="phone">Phone Number :</label>
                                        <input id="phone" name="phone" type="number" class="form-control no-spinners" placeholder="Phone Number" required>
                                        <small class="text-danger phone-error"></small>
                                    </div>
                                </div>
                            </div>
                        
                            <!-- Notes -->
                            <div class="form-group-2 mb-4">
                                <label for="notes">Additional Notes (optional) </label>
                                <textarea id="notes" name="notes" class="form-control" rows="6" placeholder="Additional Notes (optional)"></textarea>
                                <small class="text-danger notes-error"></small>
                            </div>
                        
                            <!-- Submit Button -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-main btn-round-full">Make Appointment</button>                            </div>
                        </form>
                        













                       

                        <script>
                            document.getElementById("appointment-form").addEventListener("submit", function(e) {
                                let isValid = true;

                                // التحقق من الاسم
                                const nameInput = document.getElementById("name");
                                const nameValue = nameInput.value.trim();
                                const nameError = document.querySelector(".name-error");
                                const nameRegex = /^[A-Za-z\s]+$/;

                                if (!nameRegex.test(nameValue)) {
                                    nameError.textContent = "Please enter a valid English name (no Arabic letters).";
                                    isValid = false;
                                } else {
                                    nameError.textContent = "";
                                }

                                // التحقق من رقم الهاتف
                                const phoneInput = document.getElementById("phone");
                                const phoneValue = phoneInput.value.trim();
                                const phoneError = document.querySelector(".phone-error");
                                const phoneRegex = /^(079|078|077)\d{7}$/;

                                if (!phoneRegex.test(phoneValue)) {
                                    phoneError.textContent = "Phone must be 10 digits and start with 079, 078, or 077.";
                                    isValid = false;
                                } else {
                                    phoneError.textContent = "";
                                }

                                // التحقق من الملاحظات
                                const notesInput = document.getElementById("notes");
                                const notesValue = notesInput.value.trim();
                                const notesError = document.querySelector(".notes-error");
                                const arabicRegex = /[\u0600-\u06FF]/;
                                const words = notesValue.split(/\s+/).filter(word => word !== "");

                                if (arabicRegex.test(notesValue)) {
                                    notesError.textContent = "Please do not enter Arabic letters.";
                                    isValid = false;
                                } else if (words.length > 50) {
                                    notesError.textContent = "Maximum allowed is 50 words.";
                                    isValid = false;
                                } else {
                                    notesError.textContent = "";
                                }

                                if (!isValid) e.preventDefault();
                            });

                            // عداد الكلمات
                            document.getElementById("notes").addEventListener("input", function() {
                                const words = this.value.trim().split(/\s+/).filter(word => word !== "");
                                const counter = document.getElementById("word-count");

                                if (words.length > 50) {
                                    this.value = words.slice(0, 50).join(" ");
                                }
                                counter.textContent = `${words.length} : 50 words`;
                            });
                    
                            flatpickr("#appointment_date", {
                                dateFormat: "Y-m-d",
                                minDate: "today",
                                disable: [
                                    function(date) {
                                        // أيام الجمعة (5) والسبت (6)
                                        return (date.getDay() === 5 || date.getDay() === 6);
                                    }
                                ],
                                locale: {
                                    firstDayOfWeek: 6 // يبدأ الأسبوع من السبت لو حبيت
                                }
                            });
                        </script>
                        

                    </div>
                </div>

            </div>
        </div>
    </section>

    @include('partials.footer')

    <!-- Scripts -->
    <script src="{{ asset('plugins/jquery/jquery.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</body>

</html>
