<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ReceptionistController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\DepartmentController;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Admin\StatisticsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Doctor\DashboardController;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\Admin\DoctorsAdminController;
use App\Http\Controllers\Superadmen\SuperadmenController;
use App\Http\Controllers\Superadmen\DoctorManagementController;
use App\Http\Controllers\Superadmen\ClinicManagementController;
use App\Http\Controllers\Superadmen\DepartmentsController;
use App\Http\Controllers\MedicalHistoryController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// راوتات الكونتورلير الي اسمه DoctorController
Route::get('/about', [DoctorController::class, 'about'])->name('about');


// Route::get('/doctors', [DoctorController::class, 'showDoctors'])->name('doctors.index');
Route::get('/doctor', [DoctorController::class, 'showDoctors'])->name('doctor');

Route::get('/doctor/{id}', [DoctorController::class, 'show'])->name('doctor.show');
Route::get('/doctors', [ClinicController::class, 'doctor'])->name('doctors.index');

Route::get('/', [ClinicController::class, 'index'])->name('home');

Route::get('/service', function () {
    return view('service');
})->name('service');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.show');
Route::get('/department', [DepartmentController::class, 'showDepartments'])->name('department');


///////////////////////////////////////////////////////////////Appointment///////////////////////////////////////



Route::get('/get-doctors/{clinicId}', [AppointmentController::class, 'getDoctors'])->name('appointment.getDoctors');

Route::get('/appointment', [AppointmentController::class, 'showForm'])->name('appointment.form');

Route::post('/appoinment', [AppointmentController::class, 'create'])->name('appointment.create');
// web.php

Route::get('/get-available-times/{doctorId}/{date}', [AppointmentController::class, 'getAvailableTimes']);





//Regester and login 

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



////////////////////////////////////////user profile/////////////////////////////////////////////////

// Route::get('/user-account/my-account', [PatientController::class, 'showMyAccount'])->name('user-account.my-account');

// Route::get('/user-account/update-profile', [PatientController::class, 'editProfile'])->name('user-account.editProfile');

// Route::post('/my-account/update-profile', [PatientController::class, 'updateProfile'])->name('user-account.updateProfile');


// Route::middleware(['auth'])->group(function () {
//     Route::get('/medical-history', [MedicalHistoryController::class, 'create'])->name('medical-history.create');
//     Route::post('/medical-history', [MedicalHistoryController::class, 'store'])->name('medical-history.store');
// });


// Route::middleware(['auth'])->group(function () {
//     Route::get('/user-account/medical-history', [MedicalHistoryController::class, 'create'])
//         ->name('user-account.medicalHistory');
// });

// Route::resource('appointments', AppointmentController::class);


// Route::get('/user-account/search', [PatientController::class, 'search'])->name('user-account.search');

// Route::delete('/profile-picture/delete', [PatientController::class, 'deleteProfilePicture'])->name('profile-picture.delete');

// Route::get('user/appointments/{id}/edit', [AppointmentController::class, 'edit'])->name('myappointments.edit');
// Route::put('user/appointments/{id}', [AppointmentController::class, 'update'])->name('myappointments.update');
// Route::get('/book-now', function () {
//     return view('user-account.book-now');
// })->name('book.now');

// Route::patch('/appointments/{id}/cancel', [AppointmentController::class, 'cancel'])->name('appointments.cancel');




// Group for all authenticated user account routes
Route::middleware(['auth'])->prefix('user-account')->name('user-account.')->group(function () {
    // Show user account page
    Route::get('/my-account', [PatientController::class, 'showMyAccount'])->name('my-account');

    // Edit user profile page
    Route::get('/update-profile', [PatientController::class, 'editProfile'])->name('editProfile');

    // Handle profile update submission
    Route::post('/update-profile', [PatientController::class, 'updateProfile'])->name('updateProfile');

    // Show user's medical history
    Route::get('/medical-history', [MedicalHistoryController::class, 'create'])->name('medicalHistory');

    // Search inside user account
    Route::get('/search', [PatientController::class, 'search'])->name('search');
});

// Delete profile picture
Route::delete('/profile-picture/delete', [PatientController::class, 'deleteProfilePicture'])->name('profile-picture.delete');

// Medical history creation and storage (general, outside of user account section)
Route::middleware(['auth'])->group(function () {
    Route::get('/medical-history', [MedicalHistoryController::class, 'create'])->name('medical-history.create');
    Route::post('/medical-history', [MedicalHistoryController::class, 'store'])->name('medical-history.store');
});

// Appointment resource routes (index, create, store, etc.)
Route::resource('appointments', AppointmentController::class);

// Edit user appointment
Route::get('user/appointments/{id}/edit', [AppointmentController::class, 'edit'])->name('myappointments.edit');

// Update user appointment
Route::put('user/appointments/{id}', [AppointmentController::class, 'update'])->name('myappointments.update');

// Cancel appointment
Route::patch('/appointments/{id}/cancel', [AppointmentController::class, 'cancel'])->name('appointments.cancel');

// Show "Book Now" page
Route::get('/book-now', function () {
    return view('user-account.book-now');
})->name('book.now');



///////////////////////////////////////////////////////////


Route::get('/service', [ServiceController::class, 'index'])->name('service');



Route::get('/index', [ClinicController::class, 'index'])->name('index'); 
Route::resource('clinics', ClinicController::class); 
Route::get('clinics/{id}/restore', [ClinicController::class, 'restore'])->name('clinics.restore'); 
Route::delete('clinics/{id}/force-delete', [ClinicController::class, 'forceDelete'])->name('clinics.forceDelete'); 




Route::get('/check-email', function (Request $request) {
    $exists = User::where('email', $request->email)->exists();
    return response()->json(['exists' => $exists]);
});







Route::get('/chart', function () {
    return view('admin.chart');
})->name('chart');




// use App\Http\Controllers\DepartmentController;

// Route::get('/departments', [DepartmentController::class, 'index']); 

Route::get('/departments', [DepartmentController::class, 'showDepartments']);


Route::get('/department-single', [DepartmentController::class, 'showSingle'])->name('department.single');

Route::get('/department/{id}', [DepartmentController::class, 'showDepartment'])->name('department.show');


Route::get('/doctor-single', [ClinicController::class, 'doctorSingle'])->name('doctor-single');


// Route::get('/doctor', [ClinicController::class, 'doctor'])->name('doctor');



// Route::get('/doctor', [ClinicController::class, 'doctor'])->name('doctor');
// Route::get('/doctor', [DepartmentController::class, 'index']);  


///admin
// // Middleware: Protect the admin dashboard and restrict access only to users with 'admin' role
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/appointments', [AdminController::class, 'index'])->name('admin.appointments');


    Route::get('appointments/{id}/edit', [AdminController::class, 'edit'])->name('appointments.edit');


    Route::delete('appointments/{id}', [AdminController::class, 'destroy'])->name('appointments.destroy');

    Route::put('appointments/{id}/updateStatus', [AdminController::class, 'updateStatus'])->name('appointments.updateStatus');

    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    Route::get('/admin/appointments/create', [AdminController::class, 'create'])->name('appointments.create');
    Route::post('/admin/appointments', [AdminController::class, 'store'])->name('appointments.store');

    Route::put('/admin/users/{id}', [AdminController::class, 'updateUser'])->name('users.update');
    Route::put('/admin/appointments/{id}', [AdminController::class, 'update'])->name('appointments.update');

    //الاحصائيات والرسومات

    Route::get('/admin/chart', [StatisticsController::class, 'index'])->name('admin.chart');

    Route::get('/doctors', [DoctorsAdminController::class, 'index'])->name('admin.doctors');
});

// Route::prefix('admin')->middleware(['auth'])->group(function () {
//     Route::get('/doctors', [DoctorsAdminController::class, 'index'])->name('admin.doctors');

// });






//midellware

Route::group(['middleware' => ['auth']], function () {

    //     Route::get('/admin', function () {
    //         return view('admin.index');
    //     })->middleware('role:admin';

    Route::get('/secretary-dashboard', function () {
        return view('admin.secretary_dashboard');
    })->middleware('role:secretary');
});




Route::middleware(['auth', 'role:doctor'])->group(function () {
    Route::get('/doc', [DashboardController::class, 'index'])->name('doctor.dashboard');
    Route::get('/doctor/edit/profile', [DashboardController::class, 'edit'])->name('doctor.edit.info');
    Route::post('/doctor/update', [DashboardController::class, 'update'])->name('doctor.update');
    Route::get('/doctor/{id}', [ClinicController::class, 'doctorSingle'])->name('doctor.show');

    Route::get('/medical-records/create/{appointmentId}', [DashboardController::class, 'create'])->name('doctor.medical-records.create');
    Route::post('/medical-records/store', [DashboardController::class, 'store'])->name('doctor.medical-records.store');


    Route::get('/doctor/medical-history/{user}', [DashboardController::class, 'show'])->name('doctor.medical_history.show');
    Route::post('/notifications/mark-as-read', function () {
        auth()->user()->unreadNotifications->markAsRead();
        return back();
    })->name('notifications.markAsRead');
});





// Route::get('/doc', [DashboardController::class, 'index'])->name('doctor.dashboard');
// Route::get('/doctor/edit/profile', [DashboardController::class, 'edit'])->name('doctor.edit.info');
// Route::post('/doctor/update', [DashboardController::class, 'update'])->name('doctor.update');
// });


// Routes for Reviews
// Route::get('/reviews/doctor/{doctorId}', [ReviewContrاoller::class, 'showReviewsByDoctor']);
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
// Route::post('/reviews', [ReviewController::class, 'store']);




///////////////////////////////////////////////////midellwaresuperadmin/////////////////////////////////////////////////////////////////////////////////////////////////////////////



Route::middleware('role:superadmen')->prefix('superadmin')->group(function () {

    // Dashboard
    Route::get('/dashboard', [SuperadmenController::class, 'index'])->name('superAdmin.dashboard');
    Route::get('/charts', [SuperadmenController::class, 'dashboard'])->name('superAdmin.charts');
    Route::get('/editmyprofile', [SuperadmenController::class, 'editmyprofile'])->name('superAdmin.editprofile');
    Route::get('/profile', [SuperAdmenController::class, 'showProfile'])->name('superAdmin.showprofile');


    // Doctors
    Route::get('/doctors', [DoctorManagementController::class, 'index'])->name('superAdmin.doctors.index');
    Route::get('/doctors/create', [DoctorManagementController::class, 'create'])->name('superAdmin.doctors.create');
    Route::post('/doctors/store', [DoctorManagementController::class, 'store'])->name('superAdmin.doctors.store');
    Route::get('/doctors/{id}/edit', [DoctorManagementController::class, 'edit'])->name('superAdmin.doctors.edit');
    Route::put('/doctors/{id}', [DoctorManagementController::class, 'update'])->name('superAdmin.doctors.update');
    Route::delete('/doctors/{id}', [DoctorManagementController::class, 'destroy'])->name('superAdmin.doctors.destroy');

    // Clinics
    Route::get('/clinics', [ClinicManagementController::class, 'index'])->name('superAdmin.clinics.index');
    Route::get('/clinics/create', [ClinicManagementController::class, 'create'])->name('superAdmin.clinics.create');
    Route::post('/clinics/store', [ClinicManagementController::class, 'store'])->name('superAdmin.clinics.store');
    Route::get('/clinics/{id}/edit', [ClinicManagementController::class, 'edit'])->name('superAdmin.clinics.edit');
    Route::put('/clinics/{id}', [ClinicManagementController::class, 'update'])->name('superAdmin.clinics.update');
    Route::delete('/clinics/{id}', [ClinicManagementController::class, 'destroy'])->name('superAdmin.clinics.destroy');

    // Departments
    Route::get('/departments', [DepartmentsController::class, 'index'])->name('superAdmin.departments.index');
    Route::get('/departments/create', [DepartmentsController::class, 'create'])->name('superAdmin.departments.create');
    Route::post('/departments/store', [DepartmentsController::class, 'store'])->name('superAdmin.departments.store');
    Route::get('/departments/{id}/edit', [DepartmentsController::class, 'edit'])->name('superAdmin.departments.edit');
    Route::put('/departments/{id}', [DepartmentsController::class, 'update'])->name('superAdmin.departments.update');
    Route::delete('/departments/{id}', [DepartmentsController::class, 'destroy'])->name('superAdmin.departments.destroy');
});























Route::get('/doctor/{id}', [ClinicController::class, 'doctorSingle'])->name('doctor.show');
Route::get('/doctor/{id}', [DoctorController::class, 'show'])->name('doctor.show');
