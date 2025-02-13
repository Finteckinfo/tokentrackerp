<?php

use App\Http\Controllers\WorkspaceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SendWorkspaceInviteController;
use App\Http\Controllers\ClientController;




Route::post('/login', [LoginController::class, 'login']);

Route::post('/createworkspace', [WorkspaceController::class, 'createWorkspace']);

Route::get('/workspaces', [WorkspaceController::class, 'getWorkspaces']);

Route::post('/createtask', [TaskController::class, 'createTask']);

Route::post('/sendnotification', [NotificationController::class, 'sendNotification']);

Route::get('/fetchnotifications/{user_id}', [NotificationController::class, 'fetchNotifications']);

Route::get('/fetchadmins', [UserController::class, 'fetchAdmins']);

Route::get('/fetchusers', [UserController::class, 'fetchUsers']);

Route::get('/fetchemployees', [UserController::class, 'fetchEmployees']);

Route::post('/employees', [UserController::class, 'addEmployee']);

Route::put('/employees/{id}', [UserController::class, 'updateEmployee']);

Route::delete('/employees/{id}', [UserController::class, 'deleteEmployee']);

Route::get('/workspaces/{id}', [WorkspaceController::class, 'getSpecificWorkspace']);

Route::get('/workspaces/{workdspace_id}/tasks', [TaskController::class, 'getTasksByWorkspace']);

Route::post('/sendworkspaceinvite', [SendWorkspaceInviteController::class, 'sendInvite']);

Route::get('/validateinvite/{token}', [SendWorkspaceInviteController::class, 'validateInvite']);

Route::get('/projects', [ProjectController::class, 'index']);

Route::get('/projects/{id}', [ProjectController::class, 'show']);

Route::post('/projects', [ProjectController::class, 'store']);

Route::put('/projects/{id}', [ProjectController::class, 'update']);

Route::delete('/projects/{id}', [ProjectController::class, 'destroy']);

Route::get('/clients', [ClientController::class, 'fetchclients']);

Route::post('/clients', [ClientController::class, 'store']);



Route::get('/php-version', function () {
    return response()->json([
        'app_version' => env('APP_VERSION'),
        'php_version' => phpversion(),
    ]);
});
