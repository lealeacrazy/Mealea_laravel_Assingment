<?php

namespace App\Http\Controllers;

use App\Models\users;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $users = [
        [
            'id' => 'u1',
            'name' => 'Sok Dara',
            'email' => 'sok.dara@example.com',
            'membershipDate' => '2022-01-15'
        ],
        [
            'id' => 'u2',
            'name' => 'Meng Mealea',
            'email' => 'mealea.Meng@example.com',
            'membershipDate' => '2023-03-20'
        ],
    ];

    //GET /api/users: Retrieve a list of all library members.
    public function index()
    {
        //
        return response()->json($this->users);
    }

    //POST /api/users: Add a new user. 
    public function create(Request $request)
    {
        //
        $addNewUser = [
            'id' => $request->id,
            'name' => $request->name,
            'email' => $request->email,
            'membershipDate' => $request->membershipDate,
        ];

       
        return response()->json([
            'message' => 'User created',
            'data' => $addNewUser,
        ], 201);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    //GET /api/users/{id}: Retrieve a single user by their ID.
    public function show($id)
    {
        //
        foreach ($this->users as $user) {
            if ($user['id'] == $id) {
                return response()->json($user);
            }
        }

        return response()->json(['message' => 'User not found'], 404);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(users $users)
    {
        //
    }

    //PUT /api/users/{id}: Update an existing user by their ID.
    public function update(Request $request, $id)
    {
        //
        foreach ($this->users as &$user) {
            if ($user['id'] == $id) {
                $user['name'] = $request->name ?? $user['name'];
                $user['email'] = $request->email ?? $user['email'];
                $user['membershipDate'] = $request->membershipDate ?? $user['membershipDate'];

                return response()->json([
                    'message' => 'User updated',
                    'data' => $user,
                ]);
            }

        }

    }

    // DELETE /api/users/{id}: Delete a user by their ID.
    public function delete($id)
    {
        foreach ($this->users as $key => $user) {
            if ($user['id'] == $id) {
                unset($this->users[$key]);

                return response()->json([
                    'message' => 'User deleted successfully'
                ]);
            }
        }

        return response()->json(['message' => 'User not found'], 404);
    }


}
