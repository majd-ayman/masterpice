<?php

namespace App\Http\Controllers\Superadmen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Clinic;

class ClinicManagementController extends Controller
{
    public function index()
    {
        $clinics = Clinic::all();
        return view('superAdmin.clinics.index', compact('clinics'));
    }

    public function create()
    {
        return view('superAdmin.clinics.create');
    }




    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-Z0-9\s]+$/',
                'not_regex:/[\x{0600}-\x{06FF}]/u'
            ],
            'contact_number' => [
                'required',
                'string',
                'regex:/^(078|079|077)[0-9]{7}$/'
            ],
            'facilities' => [
                'required',
                'string',
                'regex:/^[a-zA-Z0-9\s]+$/',
                'not_regex:/[\x{0600}-\x{06FF}]/u'
            ],
            'icon' => 'required|string|max:255',
            'description' => [
                'required',
                'string',
                'regex:/^[a-zA-Z0-9\s]+$/',
                'not_regex:/[\x{0600}-\x{06FF}]/u'
            ],
        ]);

        Clinic::create($request->all());

        return redirect()->route('superAdmin.clinics.index')->with('success', 'Clinic added successfully!');
    }






















    public function edit($id)
    {
        $clinic = Clinic::findOrFail($id);
        return view('superAdmin.clinics.edit', compact('clinic'));
    }

    public function update(Request $request, $id)
    {
        $clinic = Clinic::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'contact_number' => [ 'required', 'string','regex:/^(078|079|077)[0-9]{7}$/'],
            'facilities' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $clinic->update($request->all());

        return redirect()->route('superAdmin.clinics.index')->with('success', 'Clinic updated successfully!');
    }


    

    public function destroy($id)
    {
        $clinic = Clinic::findOrFail($id);
        $clinic->delete();

        return redirect()->route('superAdmin.clinics.index')->with('success', 'Clinic deleted successfully!');
    }
}
