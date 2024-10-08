<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\Contracts\View\View;

class DepartmentController extends Controller
{
    public function index(): View
    {
        $departments = Department::all();

        return view('department.departments', compact('departments'));
    }
}
