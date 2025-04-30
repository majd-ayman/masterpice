<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use Illuminate\Http\Request;
use App\Models\Doctor;
class ClinicController extends Controller
{
    
    public function index()
    {
        $clinics = Clinic::orderBy('created_at', 'asc')->take(9)->get();
        $doctors = Doctor::with('clinic')->get(); // إذا كنت بحاجة إلى الأطباء أيضًا
        return view('index', compact('clinics', 'doctors'));
    }

    public function doctor()
{
    $doctors = Doctor::with('clinic')->get();  // استرجاع الأطباء مع العيادات المرتبطة
    $clinics = Clinic::all();  // استرجاع جميع العيادات

    return view('doctor', compact('doctors', 'clinics'));  // تمرير المتغيرات إلى الـBlade
}

    // عرض نموذج إنشاء عيادة جديدة
    public function create()
    {
        return view('clinics.create');
    }

    // إنشاء عيادة جديدة
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'contact_number' => 'required|string|max:20',
            'facilities' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        Clinic::create($request->all());
        return redirect()->route('clinics.index')->with('success', 'تمت إضافة العيادة بنجاح');
    }

    // عرض بيانات عيادة معينة
    public function show($id)
    {
        $clinic = Clinic::withTrashed()->findOrFail($id);
        return view('clinics.show', compact('clinic'));
    }

    // عرض نموذج تعديل العيادة
    public function edit($id)
    {
        $clinic = Clinic::findOrFail($id);
        return view('clinics.edit', compact('clinic'));
    }

    // تحديث بيانات العيادة
    public function update(Request $request, $id)
    {
        $clinic = Clinic::withTrashed()->findOrFail($id);
        $clinic->update($request->all());
        return redirect()->route('clinics.index')->with('success', 'تم تحديث بيانات العيادة بنجاح');
    }

    // حذف عيادة (Soft Delete)
    public function destroy($id)
    {
        $clinic = Clinic::findOrFail($id);
        $clinic->delete();
        return redirect()->route('clinics.index')->with('success', 'تم حذف العيادة بنجاح');
    }

    // استعادة عيادة محذوفة
    public function restore($id)
    {
        $clinic = Clinic::onlyTrashed()->findOrFail($id);
        $clinic->restore();
        return redirect()->route('clinics.index')->with('success', 'تم استعادة العيادة بنجاح');
    }

    // حذف عيادة نهائيًا
    public function forceDelete($id)
    {
        $clinic = Clinic::onlyTrashed()->findOrFail($id);
        $clinic->forceDelete();
        return redirect()->route('clinics.index')->with('success', 'تم حذف العيادة نهائيًا');
    }





public function doctorSingle()
{
    return view('doctor-single');
}









}
