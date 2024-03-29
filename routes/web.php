<?php

use App\Http\Controllers\ContactsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ContactsController::class, 'index']);

Route::delete('/contacts/{contact}', [ContactsController::class, 'destroy'])->name('contacts.destroy');

Route::post('/contacts', [ContactsController::class, 'store'])->name('contacts.store');

