<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentList extends Model
{
    protected $fillable = [
        'name',
        'program',
        'jenis_kelamin',
        'filled',
    ];
}
