<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'last_name',
        'document',
        'departament',
        'city',
        'mobile',
        'email',
        'habeas_data'
    ];
}
