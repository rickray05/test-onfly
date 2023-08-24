<?php

namespace App\Services\Expense;

use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateExpenseService
{
    protected Request $request;
    protected int $idExpense;

    public function setRequest(Request $request): static
    {
        $this->request = $request;

        return $this;
    }

    public function setIdExpense(int $idExpense)
    {
        $this->idExpense = $idExpense;

        return $this;
    }

    public function run()
    {
        Expense::where('id', $this->idExpense)->update([
            'description'  => $this->request->description,
            'date_expense' => $this->request->date_expense,
            'value'        => $this->request->value,
            'user_id'      => Auth::id()
        ]);
    }
}
