<?php

namespace App\Http\Controllers\Superadmen;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    // عرض الأقسام
    public function index()
    {
        $departments = Department::all();
        return view('superAdmin.departments.index', compact('departments'));
    }
    // عرض صفحة إضافة قسم جديد
    public function create()
    {
        return view('superAdmin.departments.create');
    }

    // تخزين قسم جديد
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $department = new Department();
        $department->name = $request->name;
        $department->description = $request->description;

        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/departments'), $fileName);
            $department->image = $fileName;
        }

        $department->save();

        return redirect()->route('superAdmin.departments.index')->with('success', 'Department added successfully');
    }

    // عرض صفحة تعديل القسم
    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return view('superAdmin.departments.edit', compact('department'));
    }

    // تحديث قسم
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $department = Department::findOrFail($id);
        $department->name = $request->name;
        $department->description = $request->description;

        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/departments'), $fileName);
            $department->image = $fileName;
        }

        $department->save();

        return redirect()->route('superAdmin.departments.index')->with('success', 'Department updated successfully');
    }

    // حذف قسم
    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        return redirect()->route('superAdmin.departments.index')->with('success', 'Department deleted successfully');
    }
}
