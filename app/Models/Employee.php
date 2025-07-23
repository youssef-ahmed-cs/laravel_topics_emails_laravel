<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use hasFactory;
    protected $table = 'employees';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'position',
    ];


    public $hidden = [
        'created_at',
        'updated_at',
    ];
}
