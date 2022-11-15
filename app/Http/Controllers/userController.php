<?php

namespace App\Http\Controllers;

use App\Models\Program;
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
}
