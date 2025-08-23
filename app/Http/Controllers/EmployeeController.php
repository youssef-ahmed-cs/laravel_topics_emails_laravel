<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\SalesOffice;
class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with('salesOffice')->paginate(15);
        return view('employees.index' , compact('employees'));
    }

    public function create()
    {
        $salesOffices = SalesOffice::select('id','name')->get();
        return view('employees.create', compact('salesOffices'));
    }

    public function store(Request $request)
    {
        $employee = $request->validate([
            'name' => 'required',
            'sales_office_id' => 'nullable|exists:sales_offices,id',
        ]);
        $employees = Employee::create($employee);
        return redirect()->route('employees.index');
    }

    public function show($id)
    {
        $employees = Employee::findOrFail($id);
        return view('employees.show', compact('employees'));
    }

    public function edit($id)
    {
        $employee = Employee::with('salesOffice')->findOrFail($id);
        $salesOffices = SalesOffice::select('id','name')->get();

        return view('employees.edit', [
            'employee' => $employee,
            'salesOffices' => $salesOffices
        ]);
    }

    public function update(Request $request, $id)
    {
        $employees = Employee::find($id);
        $employees->update($request->all());
        return redirect()->route('employees.index');
    }

    public function destroy($id)
    {
        $employees = Employee::find($id);
        $employees->delete();
        return redirect()->route('employees.index');
    }
}
