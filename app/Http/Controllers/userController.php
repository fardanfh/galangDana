<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Development;
use App\Models\Donation;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class userController extends Controller
{
    public function index()
    {
        $program = Program::orderBy('created_at', 'asc')->where('isPublished', 1)->get();

        foreach ($program as $prog) {
            $last_date = $prog->created_at;
            $current_date = $prog->time_is_up;

            //NUMBER DAYS BETWEEN TWO DATES CALCULATOR
            $start_date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $last_date);
            $end_date = \Carbon\Carbon::createFromFormat('Y-m-d', $current_date);
            $different_days = $start_date->diffInDays($end_date);
        }

        return view('welcome', compact('program', 'different_days'));
    }

    public function donasi($id){
        $program = Program::find($id);
        $donatur = $program->donatur->where('isVerified',1);
        $devs = Development::where('program_id', $program->id)->get();
        return view('donasi', compact('program', 'devs','donatur'));
    }

    public function donasicreate($id){
        $program = Program::find($id);
        return view('createdonasi', ['program' => $program]);
    }

    public function donasistore(Request $request){
        $donatur = new Donation;
        $id_donatur_terakhir = $donatur->max('id');
        $kode_awal = '12';
        $id_program = $request->program_id;
        $id_transaksi = $kode_awal . sprintf(abs($id_program + 2)) . sprintf("%03s", abs($id_donatur_terakhir + 1));
        $donatur->program_id = $request->program_id;
        $donatur->users_id = $request->users_id;
        $donatur->id_transaksi = $id_transaksi;
        $donatur->nama_donatur = $request->nama_donatur;
        $donatur->nominal_donasi = $request->nominal_donasi;
        $donatur->email = $request->email;
        $donatur->dukungan = $request->dukungan;
        $donatur->save();

        return redirect()->route('thx', ['id' => $donatur->id]);
    }

    public function daftarprogram(Request $request){
        if($request->has('search')){
            $programs = Program::where('title', 'LIKE', '%'.$request->search.'%')->get();
        }else{
            $programs = Program::all()->where('isPublished',1);
        }
        $categories = Kategori::all();
        return view('daftarprogram', ['categories' => $categories], ['programs' => $programs]);
    }

    public function programcategory($id){
        $programCategory = Kategori::find($id);
        $categories = Kategori::all();
        $programs = Program::all();
        return view('programcategory', compact('programCategory', 'categories', 'programs'));
    }

    public function konfirmasi(Request $request){
        $donaturs = Donation::where('id_transaksi', $request->search)->where('isVerified', 0)->get();

        return view('konfirmasi', compact('donaturs'));
    }     
    
    public function konfirmasistore(Request $request, $id){
        $konfirmasi = Donation::where('id_transaksi', $id)->first();
        $collected = Donation::where('program_id', $konfirmasi->program_id)->sum('nominal_donasi');
        $program = Program::where('id', $konfirmasi->program_id)->first();
        if($request->file('bukti_pembayaran')){
            $file       = $request->file('bukti_pembayaran');
            $fileName   = $file->getClientOriginalName();
            $request->file('bukti_pembayaran')->move("images/bukti_pembayaran/", $fileName);
            $bukti = $konfirmasi->bukti_pembayaran = $fileName;
            $konfirmasi->update(['isVerified' => 1, 'bukti_pembayaran' => $bukti]);
        }
         
        $program->update(['donation_collected' => $collected]);
            
        return redirect()->route('thxkonfir', ['id' => $konfirmasi->id]);
    }

    public function thx($id){
        $donatur = Donation::find($id);
        $program = Program::where('id', $donatur->program_id)->first();
        return view('thx', compact('donatur', 'program'));
    }

    // public function report(Request $request){
    //     Report::create($request->all());
    //     Alert::success('Laporan Dikirim', 'Terima Kasih telah mengirimkan laporan');
    //     return redirect()->back();
    // }

    public function thxkonfir($id){
        $donatur = Donation::find($id);
        $program = Program::where('id', $donatur->program_id)->first();
        return view('thxkonfir', compact('donatur', 'program'));
    }

}
