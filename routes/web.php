<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;

Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
Route::post('/chat/send', [ChatController::class, 'send'])->name('chat.send');

