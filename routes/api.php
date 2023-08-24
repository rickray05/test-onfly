<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Expenses\Handlers\CreateExpenseHandler;
use App\Http\Controllers\Api\Expenses\Handlers\GetExpenseHandler;
use App\Http\Controllers\Api\Expenses\Handlers\UpdateExpenseHandler;
use App\Http\Controllers\Api\Expenses\Handlers\DeleteExpenseHandler;
use App\Http\Controllers\Api\Expenses\Handlers\GetByIdExpenseHandler;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/expense/create', CreateExpenseHandler::class);
    Route::get('/expense/list', GetExpenseHandler::class);
    Route::get('/expense/list/{idExpense}', GetByIdExpenseHandler::class);
    Route::put('/expense/update/{idExpense}', UpdateExpenseHandler::class);
    Route::delete('/expense/delete/{idExpense}', DeleteExpenseHandler::class);
});
