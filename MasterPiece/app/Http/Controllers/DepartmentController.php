<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();

        return view('doctor', compact('departments'));
    }

    

    public function showDepartments()
    {
        $departments = Department::all();

        return view('department', compact('departments'));
    }
    public function showSingle()
{
    return view('department-single');
}
public function showDepartment($id)
{
    $department = Department::findOrFail($id); 
    return view('department-single', compact('department'));
}

}

