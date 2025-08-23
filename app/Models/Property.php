<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $table = 'properties';
    protected $fillable = [
        'sales_office_id',
        'state',
        'city',
        'country',
        'zip',
        'title',
    ];

    public function salesOffice()
    {
        return $this->belongsTo(SalesOffice::class);
    }

    public function owners()
    {
        return $this->belongsToMany(Owner::class)
            ->withPivot('percent_owned');
    }
}
