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
</head>
<style>
    .swal2-confirm {
        background-color: #e12454 !important;
        /* تحديد اللون المطلوب */
        color: white;
        border: none;
    }

    .swal2-confirm:hover {
        background-color: #d11b4d !important;
        /* تغيير اللون عند المرور على الزر */
    }
</style>

<body id="top">

    @include('partials.header')

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
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <select id="clinic_id" name="clinic_id" class="form-control" required>
                                            <option value="">Choose Clinic</option>
                                            @foreach ($clinics as $clinic)
                                                <option value="{{ $clinic->id }}">{{ $clinic->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <select id="doctor_id" name="doctor_id" class="form-control" required>
                                            <option value="">Select Doctor</option>
                                        </select>
                                        <input type="hidden" id="doctor_id_hidden" name="doctor_id" value="">
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input name="appointment_date" type="date" class="form-control" required
                                            id="appointment_date" min="{{ date('Y-m-d') }}">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <select id="time_slots" name="appointment_time" class="form-control" required>
                                            <option value="">Select Time</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input name="name" type="text" class="form-control"
                                            placeholder="Full Name" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input name="phone" type="number" class="form-control"
                                            placeholder="Phone Number" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group-2 mb-4">
                                <textarea name="notes" class="form-control" rows="6" placeholder="Additional Notes (optional)"></textarea>
                            </div>

                            <button type="submit" class="btn btn-main btn-round-full">Make Appointment</button>
                        </form>

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
