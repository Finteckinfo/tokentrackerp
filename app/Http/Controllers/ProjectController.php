<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    // Fetch all projects
    public function index()
    {
        $projects = Project::paginate(10);
        return response()->json($projects, 200);
    }

    // Fetch a specific project
    public function show($id)
    {
        $project = Project::find($id);

        if (!$project) {
            return response()->json(['message' => 'Project not found'], 404);
        }

        return response()->json($project, 200);
    }

    // Create a new project
    public function store(Request $request)
    {
        // Validation rules
        $rules = [
            'project_name' => 'required|string|max:255',
            'project_type' => 'required|string|in:Internal,External',
            'client_id' => [
                'required_if:project_type,External',
                function ($attribute, $value, $fail) {
                    if ($value !== 'new' && !Client::where('id', $value)->exists()) {
                        $fail('The selected client ID is invalid.');
                    }
                },
            ],
            'new_client_name' => 'required_if:client_id,new|string|max:255',
            'new_client_company' => 'required_if:client_id,new|string|max:255',
            'new_client_address' => 'required_if:client_id,new|string|max:255',
            'new_client_phone' => 'required_if:client_id,new|numeric|digits_between:7,15',
            'new_client_country' => 'required_if:client_id,new|string|max:100',
            'start_date' => 'required|date|before:deadline',
            'deadline' => 'required|date|after:start_date',
            'status' => 'required|string|in:Incoming,In progress,On hold,Completed,Cancelled',
        ];

        // Custom validation messages
        $messages = [
            'project_name.required' => 'Project name is required.',
            'project_type.required' => 'Project type is required.',
            'client_id.required_if' => 'Client selection is required for external projects.',
            'client_id.exists' => 'The selected client ID is invalid.',
            'new_client_name.required_if' => 'New client name is required if adding a new client.',
            'new_client_company.required_if' => 'Client company is required if adding a new client.',
            'new_client_address.required_if' => 'Client address is required if adding a new client.',
            'new_client_phone.required_if' => 'Client phone number is required if adding a new client.',
            'new_client_phone.numeric' => 'Phone number must contain only numbers.',
            'new_client_phone.digits_between' => 'Phone number must be between 7 and 15 digits.',
            'new_client_country.required_if' => 'Client country is required if adding a new client.',
            'start_date.required' => 'Start date is required.',
            'deadline.required' => 'Deadline is required.',
            'status.required' => 'Status is required.',
        ];

        // Validate the request data
        $validator = Validator::make($request->all(), $rules, $messages);

        // If validation fails, return a response with validation errors
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Handle client details
        if ($request->project_type === 'External' && $request->client_id === 'new') {
            // Create a new client
            $client = Client::create([
                'name' => $request->new_client_name,
                'company' => $request->new_client_company,
                'address' => $request->new_client_address,
                'phone' => $request->new_client_phone,
                'country' => $request->new_client_country,
            ]);
            $clientId = $client->id;
            $clientName = $client->name;
        } else {
            // Use existing client
            $clientId = $request->client_id;
            $clientName = Client::find($clientId)->name;
        }

        // Create the new project
        $project = Project::create([
            'project_name' => $request->project_name,
            'project_type' => $request->project_type,
            'client_id' => $clientId,
            'client_name' => $clientName,
            'start_date' => $request->start_date,
            'deadline' => $request->deadline,
            'status' => ucfirst(strtolower($request->status)),
        ]);

        return response()->json([
            'message' => 'Project created successfully.',
            'project' => $project,
        ], 201);
    }

    // Update a project
    public function update(Request $request, $id)
    {
        $project = Project::find($id);

        if (!$project) {
            return response()->json(['message' => 'Project not found'], 404);
        }

        $project->update($request->all());

        return response()->json($project, 200);
    }

    // Delete a project
    public function destroy($id)
    {
        $project = Project::find($id);

        if (!$project) {
            return response()->json(['message' => 'Project not found'], 404);
        }

        $project->delete();

        return response()->json(['message' => 'Project deleted'], 200);
    }
}
