<?php

namespace App\Models;

use ApiPlatform\Metadata\ApiResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//#[ApiResource]
class Book extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'author_id', 'publication_date', 'isbn', 'description'];

    protected $casts = [
        'publication_date' => 'date',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
