<?php

namespace App\Http\Controllers\Api\Expenses\Handlers;

use App\Http\Controllers\Api\Expenses\Validators\CreateExpenseValidator;
use App\Http\Controllers\Controller;
use App\Models\Expense;
use App\Services\Expense\CreateExpenseService;
use App\Services\Expense\UpdateExpenseService;
use Illuminate\Http\Request;

class UpdateExpenseHandler extends Controller
{
    public function __invoke(Request $request, CreateExpenseValidator $validator){
        try {

            $expense = Expense::find($request->idExpense);
            $this->authorize('update', $expense);

            (new UpdateExpenseService())->setRequest($request)
                                        ->setIdExpense($request->idExpense)
                                        ->run();

            return response()->json([
                'status'  => 'success',
                'message' => 'User updated with success.'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status'  => 'error',
                'message' => $e->getMessage()
            ])->setStatusCode(500);
        }
    }
}
