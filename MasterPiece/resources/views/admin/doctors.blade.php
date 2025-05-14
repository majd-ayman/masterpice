@include('admin.app.header')


<div class="container-fluid pt-4 px-4">
    <div class="bg-white rounded-4 shadow p-4 mb-4">
        <h3 class="mb-0 text-center" style="color: black;">Doctors Statistics</h3>
    </div>

    <div class="row g-4">
        @forelse ($doctors as $doctor)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="bg-light border border-primary-subtle rounded-4 shadow-sm p-4 h-100 d-flex flex-column justify-content-between" style="min-height: 400px;">

                    <div class="text-center mb-3">
                        <img 
                            src="{{ asset('images/team/' . ($doctor->image ?? 'default.jpg')) }}" 
                            alt="{{ $doctor->name }}" 
                            class="rounded-circle border border-3 border-primary shadow-sm" 
                            style="width: 120px; height: 120px; object-fit: cover;"
                        >
                    </div>

                    <div class="text-center mb-3">
                        <h5 class="text-primary mb-2">{{ $doctor->name }}</h5>
                        <p class="mb-1"><strong>Clinic:</strong> {{ $doctor->clinic->name ?? 'N/A' }}</p>
                        <p class="mb-1"><strong>Working Hours:</strong> {{ $doctor->working_hours }}</p>
                    </div>

                    @php
                        $availableAppointments = $appointments->where('doctor_id', $doctor->id)->count();
                    @endphp
                    <div class="text-center mt-auto">
                        <span class="badge" style="background-color: #0d6efd; color: white; font-size: 16px;">
                            Available: {{ $availableAppointments }}
                        </span>
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
