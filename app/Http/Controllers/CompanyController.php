<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    // Show the form to create a company
    public function create()
    {
        return view('companies.create');
    }

    // Store the data in the database
    public function store(Request $request)
    {
        // 1. VALIDATION
        $request->validate([
            'name' => 'required|string|max:255',
            'website' => 'nullable|url',
            'description' => 'required|string|min:20',
        ]);

        // 2. DATA INSERTION
        Company::create([
            'user_id' => Auth::id(), 
            'name' => $request->name,
            'website' => $request->website,
            'description' => $request->description,
        ]);

        // 3. REDIRECTION
        return redirect()->route('dashboard')->with('success', 'Company Profile Created!');
    }

public function edit($id)
{
    // 1. Fetch the company. 
    $company = Company::findOrFail($id);

    if ($company->user_id !== Auth::id()) {
        abort(403, 'Unauthorized action.');
    }

    return view('companies.edit', compact('company'));
}

public function update(Request $request, $id)
{
    $company = Company::findOrFail($id);

    // Security Check
    if ($company->user_id !== Auth::id()) {
        abort(403);
    }

    // 2. Validation
    $request->validate([
        'name' => 'required|string|max:255',
        'website' => 'nullable|url',
        'description' => 'required|string|min:20',
    ]);

    // 3. Update using the update() method
    $company->update([
        'name' => $request->name,
        'website' => $request->website,
        'description' => $request->description,
    ]);

    return redirect()->route('dashboard')->with('success', 'Company Profile Updated!');
}


}