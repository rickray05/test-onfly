<?php

namespace App\Services\Expense;

use App\Models\Expense;
use Illuminate\Support\Facades\Auth;

class ListByIdExpenseService
{
    protected int $idExpense;

    public function setIdExpense(int $idExpense): static
    {
        $this->idExpense = $idExpense;

        return $this;
    }

    public function run()
    {
        return Expense::find($this->idExpense);
    }
}
