<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Kategori;
use App\Models\Program;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgramController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $info = Program::where('users_id', Auth::user()->id)->count();
        $programs = Program::where('users_id', Auth::user()->id)->orderBy('isPublished', 'DESC')->get();
        // if time is up, this destroy
       return view('user.program', compact('programs', 'info'));
    }

    public function middle(){        

        $program = Program::where('users_id', Auth::user()->id)->count();
        $programPublished = Program::where('users_id', Auth::user()->id)->where('isPublished', 1)->count();
        $programNotPublished = Program::where('users_id', Auth::user()->id)->where('isPublished', 0)->count();

        return view('user.index', compact('program', 'programPublished', 'programNotPublished'));

    }

    public function detailprogram($id){
        $program = Program::find($id);
        //$devs = Development::all()->where('program_id', $program->id);
        $donatur = Donation::where('program_id', $id)->count();
        return view('user.detailprogram', compact('program','donatur'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('user.createProgram', ['categories' => $kategori]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate( request() , [
            'title' => ['required', 'max:100'],
            'donation_target' => ['required', 'numeric'],
            'brief_explanation' => ['required', 'max:200'],
            'donation_target' => ['required', 'min:7'],
            'description' => ['required'],
            'shelter_account_number' => ['required'],
        ]);

       $program = Program::create($request->all());
       if($request->hasFile('photo'))
       {
           $request->file('photo')->move('images/program-images/', $request->file('photo')->getClientOriginalName());
           $program->photo = $request->file('photo')->getClientOriginalName();
           $program->save();
       }
        return redirect('/program');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function show(Program $program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Kategori::all();
        $program = Program::find($id);
        return view('user.edit', compact('program', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $program = Program::find($id);
        $program->update($request->all());
        if($request->hasFile('photo'))
        {
            $request->file('photo')->move('images/program-images/', $request->file('photo')->getClientOriginalName());
            $program->photo = $request->file('photo')->getClientOriginalName();
            $program->update();
        }

        return redirect('/program');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Program::destroy($id);
        return redirect()->back();
    }
}
