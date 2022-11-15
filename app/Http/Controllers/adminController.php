<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class adminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.dashboard');
    }

    public function program()
    {
        $program = Program::orderBy('created_at', 'asc')->get();

        return view('admin.program', compact('program'));
    }

}
