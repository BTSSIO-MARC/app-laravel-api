<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;


Route::get('/etudiants', [EtudiantController::class, 'index']);
