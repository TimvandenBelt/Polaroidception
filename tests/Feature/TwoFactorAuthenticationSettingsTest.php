<?php

use App\Models\User;
use function Pest\Laravel\{post, withSession, delete, actingAs};

test("two-factor authentication can be enabled", function (User $user) {
    actingAs($user);

    withSession(["auth.password_confirmed_at" => time()]);

    post("/user/two-factor-authentication");

    expect($user->fresh()->two_factor_secret)->not->toBeNull();
    expect($user->fresh()?->recoveryCodes())->toHaveCount(8);
})->with("single-user");

test("recovery codes can be regenerated", function (User $user) {
    actingAs($user);

    withSession(["auth.password_confirmed_at" => time()]);

    post("/user/two-factor-authentication");
    post("/user/two-factor-recovery-codes");

    $user = $user->fresh();

    post("/user/two-factor-recovery-codes");

    expect($user->recoveryCodes())->toHaveCount(8);
    expect(
        array_diff($user->recoveryCodes(), $user->fresh()?->recoveryCodes()),
    )->toHaveCount(8);
})->with("single-user");

test("two-factor authentication can be disabled", function (User $user) {
    actingAs($user);

    withSession(["auth.password_confirmed_at" => time()]);

    post("/user/two-factor-authentication");

    $this->assertNotNull($user->fresh()->two_factor_secret);

    delete("/user/two-factor-authentication");

    expect($user->fresh()->two_factor_secret)->toBeNull();
})->with("single-user");
