<?php

namespace App\Http\Controllers\Api\Expenses\Handlers;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use App\Services\Expense\DeleteExpenseService;
use App\Services\Expense\UpdateExpenseService;
use Illuminate\Http\Request;

class DeleteExpenseHandler extends Controller
{
    public function __invoke(Request $request){
        try {

            $expense = Expense::find($request->idExpense);
            $this->authorize('delete', $expense);

            (new DeleteExpenseService())->setIdExpense($request->idExpense)
                                        ->run();

            return response()->json([
                'status'  => 'success',
                'message' => 'User deleted with success.'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status'  => 'error',
                'message' => $e->getMessage()
            ])->setStatusCode(500);
        }
    }
}
