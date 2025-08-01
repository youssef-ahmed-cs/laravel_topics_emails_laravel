<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = ['id'];
    public function user ()
    {
        return $this->hasOne(User::class);
    }
}
