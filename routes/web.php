<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        "name" => "Mon API",
        "version" => "1.0.0",
        "status" => "OK",
        "endpoints" => [
            "etudiants" => "https://domaine.local/etudiants",
            "communes" => "https://domaine.local/communes",
            "classes" => "https://domaine.local/classes",
            "documentation" => "https://domaine.local/doc"
        ]
    ]);
});
