<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Review;
class ClinicController extends Controller
{

    public function index()

    {       
        
        // $clinics = Clinic::orderBy('created_at', 'desc')->take(7)->get();

        $clinics = Clinic::orderBy('created_at', 'asc')->take(9)->get();
        $doctors = Doctor::with('clinic')->get();
            $reviews = Review::with('user')->latest()->get();

        return view('index', compact('clinics', 'doctors' ,'reviews'));
    }

    public function doctor()
    {
        $doctors = Doctor::with('clinic')->get();
        $clinics = Clinic::all();

        return view('doctor', compact('doctors', 'clinics'));
    }

    public function create()
    {
        return view('clinics.create');
    }

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
        return redirect()->route('clinics.index')->with('success', 'Clinic added successfully');
    }

    public function show($id)
    {
        $clinic = Clinic::withTrashed()->findOrFail($id);
        return view('clinics.show', compact('clinic'));
    }

    public function edit($id)
    {
        $clinic = Clinic::findOrFail($id);
        return view('clinics.edit', compact('clinic'));
    }

    public function update(Request $request, $id)
    {
        $clinic = Clinic::withTrashed()->findOrFail($id);
        $clinic->update($request->all());
        return redirect()->route('clinics.index')->with('success', 'Clinic data updated successfully');
    }

    public function destroy($id)
    {
        $clinic = Clinic::findOrFail($id);
        $clinic->delete();
        return redirect()->route('clinics.index')->with('success', 'Clinic deleted successfully');
    }

    public function restore($id)
    {
        $clinic = Clinic::onlyTrashed()->findOrFail($id);
        $clinic->restore();
        return redirect()->route('clinics.index')->with('success', 'Clinic successfully restored');
    }

    public function forceDelete($id)
    {
        $clinic = Clinic::onlyTrashed()->findOrFail($id);
        $clinic->forceDelete();
        return redirect()->route('clinics.index')->with('success', 'Clinic permanently deleted');
    }





    public function doctorSingle()
    {
        return view('doctor-single');
    }






}
