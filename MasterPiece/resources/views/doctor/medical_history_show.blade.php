@include('doctor.apps.header')

<div class="container my-5">
    <h2 class="mb-4">Medical History for {{ $history->user->name ?? 'Patient' }}</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Chronic Diseases:</strong> {{ $history->chronic_diseases ?? 'N/A' }}</li>
                <li class="list-group-item"><strong>Current Medications:</strong> {{ $history->current_medications ?? 'N/A' }}</li>
                <li class="list-group-item"><strong>Allergies:</strong> {{ $history->allergies ?? 'N/A' }}</li>
                <li class="list-group-item"><strong>Past Surgeries:</strong> {{ $history->past_surgeries ?? 'N/A' }}</li>
                <li class="list-group-item"><strong>Pregnant:</strong> {{ $history->is_pregnant ? 'Yes' : 'No' }}</li>
                <li class="list-group-item"><strong>Family History:</strong> {{ $history->family_history ?? 'N/A' }}</li>
                <li class="list-group-item"><strong>Lifestyle:</strong> {{ $history->lifestyle ?? 'N/A' }}</li>
                <li class="list-group-item"><strong>Mental Health Notes:</strong> {{ $history->mental_health_notes ?? 'N/A' }}</li>
                <li class="list-group-item"><strong>Additional Notes:</strong> {{ $history->additional_notes ?? 'N/A' }}</li>
            </ul>
        </div>
    </div>

    <a href="{{ url()->previous() }}" class="btn btn-primary mt-4">Back</a>
</div>

@include('doctor.apps.footer')
