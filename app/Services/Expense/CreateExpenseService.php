<?php

namespace App\Services\Expense;

use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateExpenseService
{
    protected Request $request;

    public function setRequest(Request $request): static
    {
        $this->request = $request;

        return $this;
    }

    public function run()
    {
        Expense::create([
            'description'  => $this->request->description,
            'date_expense' => $this->request->date_expense,
            'value'        => $this->request->value,
            'user_id'      => Auth::id()
        ]);
    }
}
