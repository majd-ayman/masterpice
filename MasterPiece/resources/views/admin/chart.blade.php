{{-- @include('admin.app.header')

<div class="container-fluid pt-4 px-4">
    <div class="bg-white rounded-4 shadow p-4 mb-4">
        <h3 class="mb-0 text-center" style="color:black">Booking Charts</h3>
    </div>

    <!-- Charts Section -->
    <div class="row g-4">   

        <!-- Line Chart: Daily Reservations -->
        <div class="col-12 col-md-6 col-xl-6 mb-4">
            <div class="bg-white rounded-4 shadow p-5">
                <h4 class="mb-4 text-center">Daily Reservations</h4>
                <canvas id="line-chart" height="400" width="400"></canvas>
            </div>
        </div>

        <!-- Pie Chart: Appointments per Clinic -->
        <div class="col-12 col-md-6 col-xl-6 mb-4">
            <div class="bg-white rounded-4 shadow p-5">
                <h4 class="mb-4 text-center">Rate of bookings by clinic</h4>
                <canvas id="clinic-pie-chart" height="400" width="400"></canvas>
            </div>
        </div>

    </div>

  <!-- Appointments by Day Chart -->
<div class="row g-4">
    <div class="col-12">
        <div class="bg-white rounded-4 shadow p-5 mb-4">
            <h4 class="mb-4 text-center">Appointments by Day</h4>
            <canvas id="appointmentsByDayChart" style="max-height: 300px;"></canvas>
        </div>
    </div>
</div>


@include('admin.app.footer')

<!-- Chart.js Library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Line Chart Script -->
<script>
    const lineChartCtx = document.getElementById('line-chart').getContext('2d');
    new Chart(lineChartCtx, {
        type: 'line',
        data: {
            labels: {!! json_encode($dates) !!},
            datasets: [{
                label: 'Daily Reservations',
                data: {!! json_encode($counts) !!},
                borderColor: 'rgba(79, 172, 255, 1)',
                backgroundColor: 'rgba(79, 172, 255, 0.2)',
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                }
            }
        }
    });
</script>

<!-- Pie Chart Script -->
<script>
    const clinicPieCtx = document.getElementById('clinic-pie-chart').getContext('2d');
    new Chart(clinicPieCtx, {
        type: 'pie',
        data: {
            labels: {!! json_encode($clinicNames) !!},
            datasets: [{
                label: 'Number of bookings',
                data: {!! json_encode($clinicCounts) !!},
                backgroundColor: [
                    'rgba(79, 172, 255, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 206, 86, 0.7)',
                    'rgba(153, 102, 255, 0.7)',
                    'rgba(54, 162, 235, 0.7)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
</script>

<!-- Appointments by Day Script -->
<script>
    const ctx = document.getElementById('appointmentsByDayChart').getContext('2d');
    const appointmentsByDayChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($days),
            datasets: [{
                label: 'Appointments Count',
                data: @json($dayCounts),
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script> --}}
