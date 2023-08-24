<?php

namespace App\Services\Expense;

use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeleteExpenseService
{
    protected int $idExpense;

    public function setIdExpense(int $idExpense)
    {
        $this->idExpense = $idExpense;

        return $this;
    }

    public function run()
    {
        Expense::where('id', $this->idExpense)->delete();
    }
}
