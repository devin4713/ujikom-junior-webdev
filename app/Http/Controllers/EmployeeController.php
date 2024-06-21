<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function showweb() {
        return view('emplist', [
            'title' => 'Daftar Pegawai'
        ]);
    }

    public function getdata () {
        $employees = Employee::all();
        return response()->json(['data' => $employees]);
    }

    public function showdetail($id) {
        $employee = Employee::findOrFail($id);

        return view('empdetail', [
            'title' => 'Detail Pegawai',
            'employee' => $employee
        ]);
    }

    public function destroy($id) {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return response()->json(['message' => 'Employee deleted successfully'], 200);
    }

    public function create() {
        return view('empcreate', [
            'title' => 'Tambah Pegawai Baru'
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'umur' => 'required|integer',
            'lama_bekerja' => 'required|integer',
            'deskripsi' => 'required|string',
        ]);

        Employee::create($validatedData);

        return redirect('/emplist')->with('success', 'Pegawai berhasil ditambahkan');
    }

    public function edit($id) {
        $employee = Employee::findOrFail($id);
        return view('empcreate', [
            'title' => 'Edit Pegawai',
            'employee' => $employee
        ]);
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'umur' => 'required|integer',
            'lama_bekerja' => 'required|integer',
            'deskripsi' => 'required|string',
        ]);
        $employee = Employee::findOrFail($id);

        $employee->update($validatedData);

        return redirect('/emplist')->with('success', 'Pegawai berhasil diperbarui');
    }
}
