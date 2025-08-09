<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;
    protected $table = 'flights'; // Specify the table name if it differs from the default 'flights'

    protected $fillable = [
        'destination',
        'flight_number',
        'airline',
        'departure_time',
        'arrival_time',
        'status',
    ];
}
