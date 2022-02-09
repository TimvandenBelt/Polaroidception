<?php

test("webserver returns a 200 response ")
    ->get("/")
    ->assertOk();
