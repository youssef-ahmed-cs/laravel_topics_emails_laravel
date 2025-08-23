<?php

require_once 'vendor/autoload.php';

use App\Models\Book;
use App\Models\User;

// This is a simple test script to verify book update functionality
echo "Testing Book Update Functionality...\n";

// Check if we can find any books
$books = Book::all();
echo "Found " . $books->count() . " books in database\n";

if ($books->count() > 0) {
    $book = $books->first();
    echo "Testing update on book ID: " . $book->id . "\n";
    echo "Current title: " . $book->title . "\n";
    
    // Try to update the book
    $updated = $book->update([
        'title' => 'Updated Title - ' . now()->format('H:i:s'),
        'description' => 'Updated description at ' . now()->format('Y-m-d H:i:s')
    ]);
    
    if ($updated) {
        echo "Book updated successfully!\n";
        $book->refresh();
        echo "New title: " . $book->title . "\n";
    } else {
        echo "Failed to update book\n";
    }
} else {
    echo "No books found in database\n";
}

echo "Test completed.\n";
