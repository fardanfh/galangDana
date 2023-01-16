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

    public function published($id){
        $program = Program::find($id);
        if($program->isPublished == 0){
            $program->update(['isPublished' => 1]);
        }else{
            $program->update(['isPublished' => 0]);
        }

        return redirect()->back();
    }

    public function selected($id){
        $program = Program::find($id);
        if($program->isSelected == 0){
            $program->update(['isSelected' => 1]);
        }else{
            $program->update(['isSelected' => 0]);
        }

        return redirect()->back();
    }

    public function detail($id){
        $program = Program::find($id);
        return view('admin.detailprogram', compact('program'));
    }

    public function hapusProgram($id){
        Program::destroy($id);
        return redirect()->back();
    }

}
