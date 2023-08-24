<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Expense extends Model
{
    use HasFactory;

    protected $table = 'expense';

    protected $fillable = [
        'description',
        'date_expense',
        'user_id',
        'value'
    ];

    public $timestamps = true;

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
