<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Actions\Fortify\PasswordValidationRules;
use Carbon\Carbon;

class NewEmployee extends Controller
{
    use PasswordValidationRules;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('people.new-employee');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $input)
    {

        $input->validate([
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'type' => ['required', 'string'],
            'gender' => ['required', 'string'],
            'birthdate' => ['required', 'date', "before:18 years ago"],
            'employment-date' => ['required', 'date'],
            'password' => $this->passwordRules(),
        ]);

        $user = User::create([
            'name' => $input['name'],
            'lastname' => $input['lastname'],
            'email' => $input['email'],
            'gender' => $input['gender'],
            'birthdate' => $input['birthdate'],
            'password' => Hash::make($input['password']),
        ]);

        Employee::create([
            'status' =>  'activo',
            'employee_type' => $input['type'],
            'hiring_date' => $input['employment-date'],
            'user_id' => $user->id
        ]);

        return back()->with('success', 'Se ha creado el empleado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
