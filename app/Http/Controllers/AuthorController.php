<?php

namespace App\Http\Controllers;

use App\Models\authors;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    private $authors = [
        [
            "id" => "1a2b",
            "name" => "Krom Ngoy",
            "bio" => "A famous Khmer poet and philosopher during the French colonial era, known for his moral and educational poems.",
            "nationality" => "Cambodian",

        ],
        [
            "id" => "2b3c",
            "name" => "Nou Hach",
            "bio" => "A Cambodian novelist and poet who wrote about society, romance, and Khmer culture.",
            "nationality" => "Cambodian"
        ],
    ];
    

    //GET /api/authors: Retrieve a list of all authors.
    public function index()
    {
        return response()->json($this->authors);
    }


    //POST /api/authors: Add a new author.
    public function create(Request $request)
    {
        $addAuthor = [
            'id' => $request->id,
            'name' => $request->name,
            'bio' => $request->bio,
            'nationality' => $request->nationality,
        ];

        return response()->json([
            'message' => 'Author created',
            'data' => $addAuthor
        ], 201);
    }

    
    //GET /api/authors/{id}: Retrieve a single author by their ID.
    public function show($id)
    {
        //
        foreach ($this->authors as $author) {
            if ($author['id']==$id) {
                return response()->json($author);
            }
        }
        return response()->json(['message'=>'author is not in list']);
    }

    //PUT /api/authors/{id}: Update an existing author by their ID.
    public function update(Request $request, $id)
    {
        foreach ($this->authors as &$author) {
            if ($author['id'] == $id) {
                $author['name'] = $request->name ?? $author['name'];
                $author['bio'] = $request->bio ?? $author['bio'];
                $author['nationality'] = $request->nationality ?? $author['nationality'];
                
                return response()->json([
                    'message' => 'Author updated',
                    'data' => $author,
                ]);
            }
        }

        return response()->json(['message' => 'Author not found'], 404);
    }


    //DELETE /api/authors/{id}: Delete an author by their ID.
    public function delete($id)
        {
            foreach ($this->authors as $key => $author) {
                if ($author['id'] == $id) {
                    unset($this->authors[$key]);

                    return response()->json([
                        'message' => 'Author deleted successfully'
                    ]);
                }
            }

            return response()->json(['message' => 'Author not found'], 404);
        }
}
