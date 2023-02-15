<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employe;
use Illuminate\Http\Request;


class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employee.index', [
            'employees' => Employe::paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create', [
            'companies' => Company::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:companies|unique:employes',
            'company_id' => 'required',
        ]);

        Employe::create($validated);
        return redirect('/employees');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function show(Employe $employe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function edit(Employe $employee)
    {
        return view('employee.edit', [
            'employee' => $employee,
            'companies' => Company::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employe $employee)
    {
        // return $request;
        $ruleEmail = '';
        if ($request->email == $employee->email) {
            $ruleEmail = 'required';
        } else {
            $ruleEmail = 'required|unique:companies|unique:employes';
        }
        $validated = $request->validate([
            'name' => 'required',
            'email' => $ruleEmail,
            'company_id' => 'required',
        ]);

        Employe::where('id', $employee->id)->update($validated);
        return redirect('/employees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employe $employee)
    {
        Employe::destroy($employee->id);
        return redirect('/employees');
    }

}
