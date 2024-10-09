<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    public function index(): View
    {
        Auth::user()->can('admin') ?: abort(403, 'Acesso negado');

        $departments = Department::all();

        return view('department.departments', compact('departments'));
    }

    public function newDepartment(): View
    {
        Auth::user()->can('admin') ?: abort(403, 'Acesso negado');

        return view('department.add-department');
    }

    public function createDepartment(Request $request): View
    {
        Auth::user()->can('admin') ?: abort(403, 'Acesso negado');

        $request->validate([
            'name' => 'required|string|max:50|unique:departments'
        ]);

        Department::create([
            'name' => $request->name
        ]);

        return redirect()->route('departments');
    }

    public function editDepartment($id)
    {
        Auth::user()->can('admin') ?: abort(403, 'Acesso negado');

        if (intval($id) === 1) {
            return redirect()->route('departments');
        }

        $department = Department::findOrFail($id);

        return view('department.edit-department', compact('department'));
    }

    public function updateDepartment(Request $request)
    {
        Auth::user()->can('admin') ?: abort(403, 'Acesso negado');

        $id = $request->id;

        // validação
        $request->validate([
            'id' => 'required',
            'name' => 'required|string|max:50|unique:departments,name,' . $id
        ]);

        if (intval($id) === 1) {
            return redirect()->route('departments');
        }

        $department = Department::findOrFail($id);

        // update on db
        $department->update([
            'name' => $request->name
        ]);

        return redirect()->route('departments');
    }
}
