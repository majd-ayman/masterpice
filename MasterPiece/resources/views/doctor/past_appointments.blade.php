@include('doctor.apps.header')


<!-- Past Appointments -->
<div class="col-md-11 mt-5 md-10">
<h4 style="text-align: center; margin-bottom: 10px;">Past Appointments</h4>
    <table class="table table-bordered table-striped mt-4">
        <thead class="thead-dark">
            <tr>
                <th>Patient Name</th>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pastAppointments as $appointment)
                <tr>
                    <td>{{ $appointment->user->name ?? 'N/A' }}</td>
                    <td>{{ $appointment->appointment_date }}</td>
                    <td>{{ $appointment->appointment_time }}</td>
                    <td>{{ $appointment->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
        <a href="{{ url()->previous() }}" class="btn btn-primary mt-4">Back</a>

</div>
@include('doctor.apps.footer')