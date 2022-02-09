<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", function () {
    return Inertia::render("Welcome", [
        "canLogin" => Route::has("login"),
        "canRegister" => Route::has("register"),
        "laravelVersion" => Application::VERSION,
        "phpVersion" => PHP_VERSION,
    ]);
})->name("index");

Route::get("/login", function () {
    return "test";
})->name("login");

Route::prefix("admin")
    ->name("admin.")
    ->group(function () {
        Route::get("/", function () {
            return Inertia::render("Admin/AdminIndex", [
                "title" => "Admin dashboard",
            ]);
        })->name("index");

        Route::get("account/profile", function () {
            return Inertia::render("Admin/AdminIndex", [
                "title" => "Profile",
            ]);
        })->name("profile.index");

        Route::get("account/settings", function () {
            return Inertia::render("Admin/AdminIndex", [
                "title" => "Account settings",
            ]);
        })->name("settings.index");

        Route::get("/pages", function () {
            return Inertia::render("Admin/Pages/PagesIndex", [
                "title" => "Manage pages",
            ]);
        })->name("pages.index");

        Route::get("/photos", function () {
            return Inertia::render("Admin/AdminIndex", [
                "title" => "Manage photos",
            ]);
        })->name("photos.index");

        Route::get("/tags", function () {
            return Inertia::render("Admin/AdminIndex", [
                "title" => "Manage Tags",
            ]);
        })->name("tags.index");
    });

Route::middleware(["auth:sanctum", "verified"])
    ->get("/dashboard", function () {
        return Inertia::render("Dashboard");
    })
    ->name("dashboard");
