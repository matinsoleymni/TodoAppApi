<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post("/login" , [AuthController::class , "login"]);
Route::post("/register" , [AuthController::class , "register"]);
Route::post("/logout" , [AuthController::class , "logout"])->middleware("auth:sanctum");
Route::post("/me" , [AuthController::class , "me"])->middleware("auth:sanctum");

Route::prefix("category")->middleware("auth:sanctum")->controller(CategoryController::class)->name("category.")->group(function(){
    Route::get("/" , "index")->name("index");
    Route::get("/{id}" , "show")->name("show");
    Route::post("/create" , "create")->name("create");
    Route::put("/edit/{id}" , "edit")->name("edit");
    Route::delete("/delete/{id}" , "delete")->name("delete");
});
