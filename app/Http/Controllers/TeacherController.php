<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $students = User::where('role', 'Student')->latest()->paginate(10);
        return view('teacher.index', compact('students'));
    }
}
