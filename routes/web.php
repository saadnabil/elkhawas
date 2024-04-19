<?php

use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;

Route::get('change-lang', [LanguageController::class, 'change'])->name('changelang');








