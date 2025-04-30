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
            'name' => 'required|string|max:255',
            'contact_number' => 'nullable|string|max:20',
            'facilities' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'description' => 'nullable|string',
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
            'contact_number' => 'nullable|string|max:20',
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
