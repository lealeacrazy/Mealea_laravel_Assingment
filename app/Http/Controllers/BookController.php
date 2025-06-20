<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book; 

class BookController extends Controller
{
    // GET /api/books
    public function index()
    {
        return response()->json(Book::all());
    }

    // GET /api/books/{id}
    public function show($id)
    {
        $book = Book::find($id);
        if ($book) {
            return response()->json($book);
        }
        return response()->json(['message' => 'Book not found'], 404);
    }

    // POST /api/books
    public function store(Request $request) // use 'store' not 'create'
    {
        $book = Book::create($request->all());

        return response()->json([
            'message' => 'Book created',
            'data' => $book,
        ], 201);
    }

    // PUT /api/books/{id}
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        $book->update($request->all());

        return response()->json([
            'id' => $book->id,
            'message' => 'Book updated',
            'data' => $book,
        ]);
    }

    // DELETE /api/books/{id}
    public function destroy($id) // use 'destroy' instead of 'delete'
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        $book->delete();

        return response()->json(['message' => 'Book deleted']);
    }
}
