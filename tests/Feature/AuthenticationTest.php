<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use function Pest\Laravel\{assertAuthenticated, assertGuest, post};

test("login screen can be rendered")
    ->get("/login")
    ->assertStatus(200);

test("users can authenticate using the login screen", function (User $user) {
    post("/login", [
        "email" => $user->email,
        "password" => "password",
    ])->assertRedirect(RouteServiceProvider::HOME);

    assertAuthenticated();
})->with("single-user");

test("users can not authenticate with invalid_password", function (User $user) {
    post("/login", [
        "email" => $user->email,
        "password" => "wrong-password",
    ]);

    assertGuest();
})->with("single-user");
