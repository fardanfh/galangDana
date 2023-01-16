<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Program extends Model
{
    protected $fillable = ['users_id', 'category_id', 'title', 'brief_explanation', 'photo', 'donation_target', 'donation_collected', 'time_is_up', 'shelter_account_number', 'description', 'isPublished', 'isSelected'];

    public function getFoto(){
        return asset('images/program-images/' . $this->photo);
    }

    public function getHari()
    {
        $last_date = $this->time_is_up;
        $current_date = Carbon::now()->toDateTimeString();

        //NUMBER DAYS BETWEEN TWO DATES CALCULATOR
        $start_date = \Carbon\Carbon::createFromFormat('Y-m-d', $last_date);
        $end_date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $current_date);

        return $start_date->diffInDays($end_date);
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'users_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Kategori');
    }

   
    public function donatur()
    {
        return $this->hasMany('App\Models\Donation')->orderBy('isVerified');
    }

    public function reports()
    {
        return $this->hasMany('App\Models\Report');
    }


}
