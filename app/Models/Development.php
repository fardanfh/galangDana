<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Development extends Model
{
    protected $fillable = ['program_id', 'title', 'description'];
}