<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    // fake books
    private $books = [
        [
            'id' => 1,
            'title' => 'Harry Potter',
            'description' => 'A popular fantasy novel',
            'authorId' => 'a1',
            'publicationYear' => 1997,
            'genre' => 'Fantasy',
        ],
        [
            'id' => 2,
            'title' => 'Cinderella',
            'description' => 'A classic fairy tale',
            'authorId' => 'a2',
            'publicationYear' => 1950,
            'genre' => 'Children',
        ],
    ];

    // GET /api/books: Retrieve a list of all books.
    public function index()
    {
        return response()->json($this->books);
    }

    // GET /api/books/{id}: Retrieve a single book by its ID
    public function show($id)
    {
        foreach ($this->books as $book) {
            if ($book['id'] == $id) {
                return response()->json($book);
            }
        }

        return response()->json(['message' => 'Book not found'], 404);
    }


    //POST /api/books: Add a new book.
    public function create(Request $request)
    {
        $newBook = [
            'id' => $request->id, 
            'title' => $request->title,
            'description' => $request->description,
            'authorId' => $request->authorId,
            'publicationYear' => $request->publicationYear,
            'genre' => $request->genre,
        ];

        // return the new book
        return response()->json([
            'message' => 'Book created',
            'data' => $newBook,
        ], 201);
    }

        // PUT /api/books/{id}: Update an existing book by its ID.
    public function update(Request $request, $id)
    {
        foreach ($this->books as &$book) {
            if ($book['id'] == $id) {
                $book['title'] = $request->title ?? $book['title'];
                $book['description'] = $request->description ?? $book['description'];
                $book['authorId'] = $request->authorId ?? $book['authorId'];
                $book['publicationYear'] = $request->publicationYear ?? $book['publicationYear'];
                $book['genre'] = $request->description ?? $book['genre'];

                return response()->json([
                    'message' => 'Book updated',
                    'data' => $book,
                ]);
            }
        }

        return response()->json(['message' => 'Book not found'], 404);
    }


    // DELETE /api/books/{id}: Delete a book by its ID.
public function delete($id)
{
    foreach ($this->books as $key => $book) {
        if ($book['id'] == $id) {
            unset($this->books[$key]);

            return response()->json([
                'message' => 'Book deleted successfully'
            ]);
        }
    }

    return response()->json(['message' => 'Book not found'], 404);
}

}
