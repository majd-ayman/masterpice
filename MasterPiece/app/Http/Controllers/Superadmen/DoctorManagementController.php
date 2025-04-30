<?php

namespace App\Http\Controllers\Superadmen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Clinic;
use App\Models\Department;
use App\Models\User;

class DoctorManagementController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with(['clinic', 'department', 'user'])->get();
        return view('superAdmin.doctors.index', compact('doctors'));
    }

    public function create()
    {
        $clinics = Clinic::all();
        $departments = Department::all();
        return view('superAdmin.doctors.create', compact('clinics', 'departments'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            
            'email' => 'required|email|unique:users,email', 
            'password' => 'required|string|min:8', 
            'clinic_id' => 'required|exists:clinics,id', 
            'department_id' => 'required|exists:departments,id', 
        ]);
    
        $clinic = Clinic::find($request->clinic_id);
    
        // إنشاء المستخدم (الطبيب) في جدول المستخدمين
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // تشفير كلمة السر
            'role' => 'doctor',  // تعيين دور المستخدم كـ 'doctor'
        ]);
    
        // الآن يتم إضافة الطبيب إلى جدول الأطباء
        $doctor = Doctor::create([
            'user_id' => $user->id,  // ربط الطبيب بالمستخدم
            'clinic_id' => $clinic->id,  // ربط الطبيب بالعيادة
            'department_id' => $request->department_id,  // ربط الطبيب بالقسم
            'name' => $request->name,  // اسم الطبيب
        ]);
    
        // التحقق من أن البيانات تم إضافتها بنجاح
        // dd($doctor);  // عرض بيانات الطبيب الذي تم إضافته للتحقق من النجاح
    
        return redirect()->route('superAdmin.doctors.index')->with('success', 'Doctor added successfully');
    }
    
    
    
    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        $clinics = Clinic::all();
        $departments = Department::all();
        $users = User::all();
        return view('superAdmin.doctors.edit', compact('doctor', 'clinics', 'departments','users'));
    }

    public function update(Request $request, $id)
    {
        $doctor = Doctor::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'user_id' => 'required|exists:users,id|unique:doctors,user_id,' . $doctor->id,
            'clinic_id' => 'required|exists:clinics,id|unique:doctors,clinic_id,' . $doctor->id,
            'department_id' => 'required|exists:departments,id',
            'specialty' => 'required|string|max:100',
            'available_from' => 'required|date_format:H:i',
            'available_to' => 'required|date_format:H:i',
            'description' => 'nullable|string',
            'skills' => 'nullable|string',
            'educational_qualifications' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'experience' => 'nullable|integer',
            'working_days' => 'nullable|json',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/doctors'), $fileName);
            $data['image'] = $fileName;
        }

        $doctor->update($data);

        return redirect()->route('superAdmin.doctors.index')->with('success', 'Doctor updated successfully');
    }

    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();

        return redirect()->route('superAdmin.doctors.index')->with('success', 'Doctor deleted successfully');
    }
}
