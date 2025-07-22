<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Models\User;
class TaskController extends Controller
{
    public function index()
    {
        $task = Task::all();
        return response()->json($task, 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'status' => 'required|in:pending,in_progress,completed',
        ]);
        $task = Task::create($data);
        return response()->json([
            'message' => 'Task created successfully',
            'task' => $task
        ], 201);
    }

    public function show($id){
        $task = Task::find($id);
        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }
        return response()->json($task, 200);
    }

    public function update($id, Request $request)
    {
        $task = Task::find($id);
        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        $data = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'status' => 'sometimes|required|in:pending,in_progress,completed',
        ]);

        $task->update($data);
        return response()->json([
            'message' => 'Task updated successfully',
            'task' => $task
        ], 200);
    }

    public function delete($id){
        $task = Task::find($id);
        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }
        $task->delete();
        return response()->json(['message' => 'Task deleted successfully'], 200);
    }

    public function getTasksByUser(int $userId)
    {
        $tasks = Task::where('user_id', $userId)->get();

        return response()->json([
            'message' => 'Tasks retrieved successfully',
            'tasks' => $tasks
        ], 200);
    }


}
