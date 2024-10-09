<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Department;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class RhUserController extends Controller
{
    public function index(): View
    {
        Auth::user()->can('admin') ?: abort(403, 'Acesso negado');

        $colaborators = User::where('role', 'rh')->get();

        return view('colaborators.rh-users', compact('colaborators'));
    }

    public function newColaborator(): View
    {
        Auth::user()->can('admin') ?: abort(403, 'Acesso negado');

        $departments = Department::all();

        return view('colaborators.add-rh-user', compact('departments'));
    }

    public function createColaborator(Request $request)
    {
        Auth::user()->can('admin') ?: abort(403, 'Acesso negado');

        //form validation
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'select_department' => 'required|exists:departments,id'
        ]);

        // create new rh user
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = 'rh';
        $user->department_id = $request->select_department;
        $user->permissions = '["rh"]';

        $user->save();

        return redirect()->route('colaborators.rh-users')->with('success', 'Colaborador criado com sucesso');
    }
}
