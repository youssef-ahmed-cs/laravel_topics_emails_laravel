<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Book::class);
        $books = Book::with('author')->paginate(10);
        return BookResource::collection($books);
    }

    public function show(Book $book)
    {
        $this->authorize('view', $book);
        return new BookResource($book->load('author'));
    }

    public function store(StoreBookRequest $request)
    {
        $this->authorize('create', Book::class);
        $book = Book::create($request->validated());
        return response()->json([
            'message' => 'Book created successfully',
            'book' => new BookResource($book->load('author'))
        ], 201);
    }

    public function update(UpdateBookRequest $request, Book $book)
    {
        $this->authorize('update', $book);
        $book->update($request->validated());
        return response()->json([
            'message' => 'Book updated successfully',
            'book' => new BookResource($book->load('author'))
        ]);
    }

    public function destroy(Book $book)
    {
        $this->authorize('delete', $book);
        $book->delete();
        return response()->json([
            'message' => 'Book deleted successfully'
        ]);
    }
}
