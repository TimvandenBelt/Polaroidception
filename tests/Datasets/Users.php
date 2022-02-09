<?php

use App\Models\User;

dataset("single-user", function () {
    yield fn() => User::factory()->create();
});
