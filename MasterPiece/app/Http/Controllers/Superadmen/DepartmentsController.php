<?php

namespace App\Http\Controllers\Superadmen;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        return view('superAdmin.departments.index', compact('departments'));
    }

    public function create()
    {
        return view('superAdmin.departments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'long_description' => 'nullable|string',
            'services' => 'nullable|string',
            'services_features' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $department = new Department();
        $department->name = $request->name;
        $department->description = $request->description;
        $department->long_description = $request->long_description;
        $department->services = $request->services;
        $department->services_features = $request->services_features;

        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/departments'), $fileName);
            $department->image = $fileName;
        }

        $department->save();

return redirect()->route('superAdmin.departments.index')->with('success', 'Department added successfully');    }

    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return view('superAdmin.departments.edit', compact('department'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'long_description' => 'nullable|string',
            'services' => 'nullable|string',
            'services_features' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $department = Department::findOrFail($id);
        $department->name = $request->name;
        $department->description = $request->description;
        $department->long_description = $request->long_description;
        $department->services = $request->services;
        $department->services_features = $request->services_features;

        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/departments'), $fileName);
            $department->image = $fileName;
        }

        $department->save();

return redirect()->route('superAdmin.departments.index')->with('success', 'Department data was modified successfully');    }

    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

return redirect()->route('superAdmin.departments.index')->with('success', 'The partition was deleted successfully');    }
}
