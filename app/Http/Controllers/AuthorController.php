<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthorRequest;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function store(StoreAuthorRequest $request)
    {
        $author = Author::create($request->validated());

        return response()->json([
            'message' => 'Author created',
            'data' => $author,
        ], 201);
    }

    public function index()
    {
        $authors = Author::all();

        return response()->json([
            'message' => 'Authors retrieved successfully',
            'data' => $authors,
        ]);
    }

    public function show($id)
    {
        $author = Author::find($id);
        if (!$author) {
            return response()->json(['message' => 'Author not found'], 404);
        }

        return response()->json([
            'message' => 'Author retrieved',
            'data' => $author,
        ]);
    }

    public function update(StoreAuthorRequest $request, $id)
    {
        $author = Author::find($id);
        if (!$author) {
            return response()->json(['message' => 'Author not found'], 404);
        }

        $author->update($request->validated());

        return response()->json([
            'message' => 'Author updated',
            'data' => $author,
        ]);
    }

    public function delete($id)
    {
        $author = Author::find($id);
        if (!$author) {
            return response()->json(['message' => 'Author not found'], 404);
        }

        $author->delete();

        return response()->json(['message' => 'Author deleted successfully']);
    }
}
