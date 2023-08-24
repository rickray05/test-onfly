<?php

namespace App\Http\Controllers\Api\Expenses\Handlers;

use App\Http\Controllers\Controller;
use App\Http\Resources\ExpenseResource;
use App\Models\User;
use App\Services\Expense\ListExpenseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GetExpenseHandler extends Controller
{
    public function __invoke(Request $request){
        try {
            $expense = (new ListExpenseService())->run();

            return response()->json([
                'status'  => 'success',
                'message' => 'User created with success.',
                'data'    => ExpenseResource::collection($expense)
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status'  => 'error',
                'message' => $e->getMessage()
            ])->setStatusCode(500);
        }
    }
}
