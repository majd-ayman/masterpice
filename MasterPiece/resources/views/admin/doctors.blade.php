@include('admin.app.header')


<div class="container-fluid pt-4 px-4">
    <div class="bg-white rounded-4  p-2 mb-4">
        <h2 class="mb-0 " style="color: black;">Doctors Statistics</h2>
    </div>

    <div class="row g-4">
        @forelse ($doctors as $doctor)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="bg-light border border-primary-subtle rounded-4 shadow-sm p-4 h-59 d-flex flex-column"
                    style="min-height: 400px;">

                    <div class="text-center mb-5">
                        <img src="{{ asset('images/team/' . ($doctor->image ?? 'default.jpg')) }}"
                            alt="{{ $doctor->name }}" class="rounded-circle border border-1 border-primary shadow-sm"
                            style="width: 150px; height: 150px; object-fit: cover;">
                    </div>


                    <div class="text-center" style="margin-bottom: 0.25rem;">
                        <h5 class="text-black mb-0">{{ $doctor->name }}</h5>
                        <p class="mb-1"><strong>Clinic:</strong> {{ $doctor->clinic->name ?? 'N/A' }}</p>
                    </div>

                    @php
                        $totalDailyAppointments = $appointments->where('doctor_id', $doctor->id)->count();
                    @endphp

                    <div class="text-center mt-4" style="margin-top: 0;">
                        <button class="btn btn-danger">
                             Appointments today: {{ $totalDailyAppointments }} / 10
                        </button>
                    </div>




                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    No doctors found.
                </div>
            </div>
        @endforelse
    </div>


</div>

@include('admin.app.footer')
