<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Store a newly created client in the database.
     */
    public function store(Request $request)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'country' => 'required|string|max:100',
        ]);

        // Create and save the new client
        $client = Client::create($validatedData);

        // Return a success response
        return response()->json([
            'message' => 'Client created successfully',
            'client' => $client
        ], 201);
    }

    // Fetch all clients
    public function fetchclients()
    {
        $clients = Clients::all();
        return response()->json($clients);
    }
}
