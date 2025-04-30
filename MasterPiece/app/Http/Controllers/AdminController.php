<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Clinic;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        // Start by getting today's date and day of the week
        $today = Carbon::today();
        $todayName = $today->format('l');

        // Gather stats for today
        $newPatientsToday = User::where('role', 'patient')
            ->whereDate('created_at', $today)
            ->count();

        $appointmentsToday = Appointment::whereDate('appointment_date', $today)->count();

        $waitingPatients = Appointment::whereDate('appointment_date', $today)
            ->where('status', 'waiting')
            ->count();

        $availableDoctors = Doctor::where('working_days', 'LIKE', '%' . $todayName . '%')->count();

        // Start building the appointments query with filters
        $query = Appointment::with(['user', 'doctor', 'clinic']);

        // Apply filters based on the user's input
        if ($request->filled('date')) {
            $query->whereDate('appointment_date', $request->date);
        }

        if ($request->filled('clinic_id')) {
            $query->where('clinic_id', $request->clinic_id);
        }

        if ($request->filled('doctor_id')) {
            $query->where('doctor_id', $request->doctor_id);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Get paginated results for appointments
        $appointments = $query->orderBy('appointment_date', 'desc')->paginate(10);

        // Get all clinics and doctors for filtering dropdowns
        $clinics = Clinic::all();
        $doctors = Doctor::all();

        // Return the dashboard view with all the necessary data
        return view('admin.index', compact(
            'appointmentsToday',
            'waitingPatients',
            'newPatientsToday',
            'availableDoctors',
            'appointments',
            'clinics',
            'doctors'
        ));
    }

    public function edit($id)
    {
        $appointment = Appointment::with(['user', 'clinic', 'doctor'])->findOrFail($id);
        $clinics = Clinic::all();
        $doctors = Doctor::all();

        return view('admin.edit', compact('appointment', 'clinics', 'doctors'));
    }


    public function destroy($id)
    {
        // البحث عن الموعد بناءً على الـ id
        $appointment = Appointment::findOrFail($id);

        // حذف الموعد
        $appointment->delete();

        // إعادة التوجيه بعد الحذف مع رسالة نجاح
        return redirect()->route('admin.dashboard')->with('success', 'Appointment deleted successfully');
    }
    // تحديث حالة الموعد
    public function updateStatus(Request $request, $id)
    {
        // العثور على الموعد باستخدام المعرف
        $appointment = Appointment::findOrFail($id);

        // تحديث الحالة حسب الاختيار الذي أرسله المستخدم
        $appointment->status = $request->status;
        $appointment->save();  // حفظ التغييرات

        // إعادة التوجيه مع رسالة نجاح
        return redirect()->route('admin.dashboard')->with('success', 'Appointment status updated successfully');
    }
    public function create()
    {
        // جلب جميع المستخدمين
        $users = User::where('role', 'patient')->get();
        $doctors = Doctor::all();
        $clinics = Clinic::all();

        // تمرير المستخدمين، الأطباء، والعيادات إلى الصفحة
        return view('admin.create', compact('users', 'doctors', 'clinics'));
    }

    public function store(Request $request)
    {
        // إنشاء موعد جديد
        $appointment = new Appointment();
        $appointment->user_id = $request->user_id;
        $appointment->doctor_id = $request->doctor_id;
        $appointment->clinic_id = $request->clinic_id;
        $appointment->appointment_date = $request->appointment_date;
        $appointment->appointment_time = $request->appointment_time;
        $appointment->status = 'pending';  // الحالة الافتراضية للموعد
        $appointment->save();

        return redirect()->route('admin.dashboard')->with('success', 'Appointment added successfully');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'doctor_id' => 'required|exists:doctors,id',
            'clinic_id' => 'required|exists:clinics,id',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required',
            'status' => 'required|in:pending,waiting,completed,cancelled',
        ]);

        $appointment = Appointment::findOrFail($id);
        $appointment->user_id = $request->user_id;
        $appointment->doctor_id = $request->doctor_id;
        $appointment->clinic_id = $request->clinic_id;
        $appointment->appointment_date = $request->appointment_date;
        $appointment->appointment_time = $request->appointment_time;
        $appointment->status = $request->status;
        $appointment->save();

        return redirect()->route('admin.index')->with('success', 'Appointment updated successfully');
    }
}
