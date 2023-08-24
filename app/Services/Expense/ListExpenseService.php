<?php

namespace App\Services\Expense;

use App\Models\Expense;
use Illuminate\Support\Facades\Auth;

class ListExpenseService
{
    public function run()
    {
        return Expense::where('user_id', Auth::user()->id)->get();
    }
}
