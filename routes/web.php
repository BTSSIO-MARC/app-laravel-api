<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        "name" => "Mon API",
        "version" => "1.0.0",
        "status" => "OK",
        "endpoints" => [
            "etudiants" => "https://monsite.com/etudiants",
            "departements" => "https://monsite.com/departements",
            "documentation" => "https://monsite.com/doc"
        ]
    ]);
});
