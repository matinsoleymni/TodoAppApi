<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $user_id = $request->user()->id;
        $tasks = Task::where("user_id" , "=" , $user_id)->get();

        return response()->json([
            'tasks' => $tasks
        ]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => "required",
            'description' => "required",
            'category_id' => "required|numeric",
            'flag' => "required|in:low,high,medium",
            'deadline' => "required"
        ]);

        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user()->id,
            'category_id' => $request->category_id,
            'flag' => $request->flag,
            'deadline' => $request->deadline,
        ]);

        return response()->json([
            "task" => $task
        ] , 201);
    }

    public function show(Request $request , string $id)
    {
        try {
            $task = Task::findOrFail($id);

            return response()->json([
                "task" => $task
            ]);
        }catch(Exception $e)
        {
            Log::error($e->getMessage());
            return response()->json([
                "message" => "request failed"
            ] , 500);
        }
    }

    public function edit(Request $request , string|int $id)
    {
        $request->validate([
            'title' => "required",
            'description' => "required",
            'category_id' => "required|numeric",
            'flag' => "required|is:low,hight,medium",
            'deadline' => "required|datetime",
            'is_do' => "required|boolean"
        ]);

        try {
            $task = Task::findOrFail($id);

            $task->update([
                'title' => $request->title,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'flag' => $request->flag,
                'deadline' => $request->deadline,
                'is_do' => $request->input("is_do" , false)
            ]);

            return response()->json([
                "task" => $task
            ]);
        }catch(Exception $e)
        {
            Log::error($e->getMessage());
            return response()->json([
                "message" => "request failed"
            ] , 500);
        }
    }

    public function delete(Request $request , string $id)
    {
        try {
            $task = Task::findOrFail($id);
            $task->delete();

            return response()->json([
                "message" => "task deleted"
            ]);
        }catch(Exception $e)
        {
            Log::error($e->getMessage());
            return response()->json([
                "message" => "request failed"
            ] , 500);
        }
    }

    public function done(Request $request , string $id)
    {
        $request->validate([
            'is_do' => "required|boolean"
        ]);

        try {
            $task = Task::findOrFail($id);
            $task->update([
                'is_do' => $request->is_do
            ]);

            return response()->json([
                'task' => $task
            ]);
        }catch(Exception $e)
        {
            Log::error($e->getMessage());
            return response()->json([
                "message" => "request failed"
            ] , 500);
        }
    }
}
