<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use function Pest\Laravel\{actingAs, put};

test("password can be updated", function (User $user) {
    actingAs($user);

    put("/user/password", [
        "current_password" => "password",
        "password" => "new-password",
        "password_confirmation" => "new-password",
    ]);

    expect(Hash::check("new-password", $user->fresh()->password))->toBeTrue();
})->with("single-user");

test("current password must be correct", function (User $user) {
    actingAs($user);

    put("/user/password", [
        "current_password" => "wrong-password",
        "password" => "new-password",
        "password_confirmation" => "new-password",
    ])->assertSessionHasErrors();

    expect(Hash::check("password", $user->fresh()->password))->toBeTrue();
})->with("single-user");

test("new passwords must match", function (User $user) {
    $this->actingAs($user);

    put("/user/password", [
        "current_password" => "password",
        "password" => "new-password",
        "password_confirmation" => "wrong-password",
    ])->assertSessionHasErrors();

    expect(Hash::check("password", $user->fresh()->password))->toBeTrue();
})->with("single-user");
