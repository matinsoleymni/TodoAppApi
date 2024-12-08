<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $categories = Category::where("user_id" , "=" , $user->id)->get();

        return response()->json(["categories" => $categories]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $category = Category::create([
            "name" => $request->name,
            "user_id" => $request->user()->id
        ]);

        return response()->json(['category' => $category] , 201);
    }

    public function edit(Request $request , string $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        try {
            $category = Category::findOrFail($id);
            $category->update([
                "name" => $request->name
            ]);

            return response()->json(['category' => $category , "message" => "updated"]);

        }catch (Exception $e)
        {
            Log::error($e->getMessage());
            return response()->json(["message" => "request failed."] , 400);
        }
    }

    public function show(Request $request , string $id)
    {
        try {
            $category = Category::findOrFail($id);
            return response()->json(['category' => $category]);
        }catch (Exception $e)
        {
            Log::error($e->getMessage());
            return response()->json(["message" => "request failed."] , 400);
        }
    }

    public function delete(Request $request , string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json(['message' => "deleted"]);
    }
}
