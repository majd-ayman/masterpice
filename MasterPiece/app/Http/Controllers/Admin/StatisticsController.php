<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Appointment;
use App\Models\Doctor;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Clinic;

class StatisticsController extends Controller
{
    public function index()
{
    $startOfMonth = Carbon::now()->startOfMonth();
    
    // Number of appointments per day since the start of the month
    $appointmentsPerDay = Appointment::selectRaw('DATE(created_at) as date, COUNT(*) as count')
        ->where('created_at', '>=', $startOfMonth)
        ->groupBy('date')
        ->orderBy('date')
        ->get();

    $dates = $appointmentsPerDay->pluck('date');
    $counts = $appointmentsPerDay->pluck('count');
    
    // Number of appointments by clinic
    $appointmentsPerClinic = Appointment::selectRaw('clinic_id, COUNT(*) as count')
        ->with('clinic') // Make sure the relationship exists in the model
        ->groupBy('clinic_id')
        ->get();

    $clinicNames = $appointmentsPerClinic->map(function($item) {
        return $item->clinic ? $item->clinic->name : 'Unknown';
    });
    
    $clinicCounts = $appointmentsPerClinic->pluck('count');

    // Appointment distribution by day of the week
    $appointmentsByDayOfWeek = Appointment::selectRaw('DAYOFWEEK(created_at) as day_of_week, COUNT(*) as count')
        ->where('created_at', '>=', $startOfMonth)
        ->groupBy(DB::raw('DAYOFWEEK(created_at)'))
        ->get();

    // Convert day numbers to day names
    $daysOfWeek = [
        1 => 'Saturday',
        2 => 'Sunday',
        3 => 'Monday',
        4 => 'Tuesday',
        5 => 'Wednesday',
        6 => 'Thursday',
        7 => 'Friday',
    ];

    $days = $appointmentsByDayOfWeek->map(function($item) use ($daysOfWeek) {
        return $daysOfWeek[$item->day_of_week];
    });

    $dayCounts = $appointmentsByDayOfWeek->pluck('count');

    return view('superadmin.chart', [
        'dates' => $dates,
        'counts' => $counts,
        'clinicNames' => $clinicNames,
        'clinicCounts' => $clinicCounts,
        'days' => $days,
        'dayCounts' => $dayCounts, 
    ]);


}

}