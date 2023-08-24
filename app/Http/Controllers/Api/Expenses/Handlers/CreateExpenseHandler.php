<?php

namespace App\Http\Controllers\Api\Expenses\Handlers;

use App\Http\Controllers\Api\Expenses\Validators\CreateExpenseValidator;
use App\Http\Controllers\Controller;
use App\Services\Expense\CreateExpenseService;
use Illuminate\Http\Request;

class CreateExpenseHandler extends Controller
{
    public function __invoke(Request $request, CreateExpenseValidator $validator){
        try {
            (new CreateExpenseService())->setRequest($request)
                                        ->run();

            return response()->json([
                'status'  => 'success',
                'message' => 'User created with success.'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status'  => 'error',
                'message' => $e->getMessage()
            ])->setStatusCode(500);
        }
    }
}
