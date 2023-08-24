<?php

namespace App\Http\Controllers\Api\Expenses\Handlers;

use App\Http\Controllers\Controller;
use App\Http\Resources\ExpenseResource;
use App\Models\Expense;
use App\Models\User;
use App\Services\Expense\ListByIdExpenseService;
use App\Services\Expense\ListExpenseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GetByIdExpenseHandler extends Controller
{
    public function __invoke(Request $request){
        try {

            $expense = (new ListByIdExpenseService())->setIdExpense($request->idExpense)
                                                     ->run();

            $this->authorize('view', $expense);

            return response()->json([
                'status'  => 'success',
                'message' => 'User created with success.',
                'data'    => new ExpenseResource($expense)
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status'  => 'error',
                'message' => $e->getMessage()
            ])->setStatusCode(500);
        }
    }
}
