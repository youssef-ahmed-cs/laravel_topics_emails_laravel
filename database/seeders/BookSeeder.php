<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run()
    {
        Book::factory(10)->create();

        $authors = User::where('role', 'author')->get();

        foreach ($authors as $author) {
            Book::create([
                'title' => 'Sample Book by ' . $author->name,
                'description' => 'A sample book description',
                'author_id' => $author->id,
                'publication_date' => now(),
            ]);
        }
    }
}
