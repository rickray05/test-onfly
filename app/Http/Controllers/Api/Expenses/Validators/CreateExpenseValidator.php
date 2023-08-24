<?php

namespace App\Http\Controllers\Api\Expenses\Validators;

use App\Http\Requests\AbstractFormRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CreateExpenseValidator extends AbstractFormRequest
{
    public function authorize(): bool
    {
        $user = User::find(Auth::id());

        if (!$user) {
            return false;
        }

        return true;
    }

    public function rules(): array
    {
        return [
            'description'  => 'required|max:191' ,
            'date_expense' => 'required|before_or_equal:today',
            'value'        => 'required|numeric|min:0|not_in:0'
        ];
    }
}
