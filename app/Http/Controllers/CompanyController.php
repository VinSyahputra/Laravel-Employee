<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employe;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('company.index', [
            'companies' => Company::paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return 'adasdasd';
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->file('image')->store('logo-images');
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:companies|unique:employes',
            'logo' => 'image|file|max:2048|dimensions:min_width=100|dimensions:min_height=100',
        ]);
        if ($request->file('logo')) {
            $validated['logo'] = $request->file('logo')->store('logo-images');
        }

        Company::create($validated);
        return redirect('/companies');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        // return $company->id;
        // return Employe::where('company_id', $company->id)->get();
        return view('company.show', [
            'employees' => Employe::where('company_id', $company->id)->paginate(5),
            'company' => $company
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('company.edit', [
            'company' => $company
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $ruleEmail = '';
        if ($request->email == $company->email) {
            $ruleEmail = 'required';
        } else {
            $ruleEmail = 'required|unique:companies|unique:employes';
        }
        $validated = $request->validate([
            'name' => 'required',
            'email' => $ruleEmail,
            'logo' => 'image|file|max:2048|dimensions:min_width=100|dimensions:min_height=100',
        ]);

        if ($request->file('logo')) {
            if ($company->logo) {
                Storage::delete($company->logo);
            }
            $validated['logo'] = $request->file('logo')->store('app/company');
        }

        Company::where('id', $company->id)->update($validated);
        return redirect('/companies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        if ($company->logo) {
            Storage::delete($company->logo);
        }

        Company::destroy($company->id);
        return redirect('/companies');
    }
}
