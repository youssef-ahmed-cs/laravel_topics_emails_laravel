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
        'sales_office_id',
        'manager_id',
    ];

    public function salesOffice()
    {
        return $this->belongsTo(SalesOffice::class);
    }

    public function managedOffice()
    {
        return $this->hasOne(SalesOffice::class, 'manager_id');
    }
}
