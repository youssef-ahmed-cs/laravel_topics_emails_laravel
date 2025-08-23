<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesOffice extends Model
{
    use HasFactory;
    protected $fillable = ['location', 'manager_id' , 'name'];


    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    public function manager()
    {
        return $this->belongsTo(Employee::class, 'manager_id');
    }
}
