<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'roll_no',
        'class',
        'father_name',
        'dob',
        'nrc',
        'address',
        'ph',
        'ph2',
        'ph3'
    ];
}
