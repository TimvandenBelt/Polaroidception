<?php

use function Pest\Laravel\{actingAs, assertGuest, get};

// @TODO behind auth

beforeEach(function () {
    actingAs(\App\Models\User::factory()->create());
});

it("loads the index")
    ->get("/admin/pages")
    ->assertOk();

it("shows created pages on the index", function() {
    
});

it("redirects when not authenticated", function () {
    \Illuminate\Support\Facades\Auth::logout(); // Make sure we are a guest.
    assertGuest();
});


