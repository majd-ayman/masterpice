<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    
    public function index()
    {
        $departments = Department::take(6)->get();
    
        return view('service', compact('departments'));
    }
    
    
}
