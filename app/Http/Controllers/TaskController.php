<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Subtask;
use App\Models\Taskinstructions;
use App\Models\User;

class TaskController extends Controller
{
    public function createTask(Request $request)
    {

        $userId = $request->input('assigned_to');
        $finduser = User::find($userId);

        if ($finduser) {
            $assigned_to = $finduser->id;
            $assignedto_name = $finduser->name;
        }

        $validatedData = $request->validate([
            "task_title" => "required|max:255|unique:tasks,task_title",

            "taskinstructions" => "nullable|array",
            "comment" => "nullable|string|max:500", // Each comment must be a string with max length 500
            "created_by" => "required|exists:users,id",
            'workspace_id' => 'required|integer|exists:workspaces,id',

            // Validate Subtasks

            "task_items" => "nullable|array", // Subtasks can be provided or omitted
            "task_items.*.name" => "nullable|string|max:255", // Each subtask name is optional
            "task_items.*.completed" => "boolean", // Each subtask completion status must be a boolean

        ]);

        $task = Task::create([
            "task_title" => $validatedData["task_title"],
            "assigned_to" => $assigned_to,
            "assignedto_name" => $assignedto_name,
            "budget_allocated" => $validatedData["budget_allocated"],
            "current_status" => $validatedData["current_status"],
            "created_by" => $validatedData["created_by"],
            "workspace_id" => $validatedData["workspace_id"],
        ]);


        if (!empty($request->input('task_items'))) {
            if ($request->has('task_items') && is_array($request->input('task_items'))) {
                foreach ($request->input('task_items') as $subtask) {
                    Subtask::create([
                        'task_id' => $task->id,
                        'subtask_title' => $subtask['title'] ?? null, // Defaults to null if not provided
                        'completed' => $subtask['completed'] ?? false, // Defaults to false if not provided
                    ]);
                }
            }
        };


        if (!empty($request->input('taskinstructions'))) {
            foreach ($request->input('taskinstructions') as $taskinstruction) {
                Taskinstructions::create([
                    'task_id' => $task->id,
                    'taskinstruction' => $taskinstruction,
                ]);
            }
        };
        return response()->json([
            "message" => "Task created"
        ], 200);
    }



    public function getTasksByWorkspace($workspace_id){

        $allTasks = Task::with(['subtasks', 'workspace'])->where('workspace_id', $workspace_id)->get()->groupBy('current_status');

        if($allTasks->isEmpty()){
            return response()->json([
                "message" => "No tasks found, click button to create new tasks"
            ], 404);
        };
        return response()->json($allTasks);

    }

    public function getTaskDetails() {

    }

    public function deleteTask() {}

    public function updateTask() {}
}
