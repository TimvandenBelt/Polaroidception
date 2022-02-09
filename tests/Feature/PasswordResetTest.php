<?php

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Notification;
use Laravel\Fortify\Features;
use function Pest\Laravel\{get, post};

test("reset password link screen can be rendered", function () {
    get("/forgot-password")->isOk();
})->skip(function () {
    return !Features::enabled(Features::resetPasswords());
}, "Password updates are not enabled.");

test("reset password link can be requested", function (User $user) {
    Notification::fake();

    post("/forgot-password", [
        "email" => $user->email,
    ]);

    Notification::assertSentTo($user, ResetPassword::class);
})
    ->with("single-user")
    ->skip(function () {
        return !Features::enabled(Features::resetPasswords());
    }, "Password updates are not enabled.");

test("reset password screen can be rendered", function (User $user) {
    Notification::fake();

    post("/forgot-password", [
        "email" => $user->email,
    ]);

    Notification::assertSentTo($user, ResetPassword::class, function (
        $notification,
    ) {
        get("/reset-password/" . $notification->token)->assertOk();
        return true;
    });
})
    ->with("single-user")
    ->skip(function () {
        return !Features::enabled(Features::resetPasswords());
    }, "Password updates are not enabled.");

test("password can be reset with valid token", function (User $user) {
    Notification::fake();

    post("/forgot-password", [
        "email" => $user->email,
    ]);

    Notification::assertSentTo($user, ResetPassword::class, function (
        $notification,
    ) use ($user) {
        post("/reset-password", [
            "token" => $notification->token,
            "email" => $user->email,
            "password" => "password",
            "password_confirmation" => "password",
        ])->assertSessionHasNoErrors();

        return true;
    });
})
    ->with("single-user")
    ->skip(function () {
        return !Features::enabled(Features::resetPasswords());
    }, "Password updates are not enabled.");
