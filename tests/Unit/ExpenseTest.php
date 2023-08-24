<?php

namespace Tests\Unit;

use App\Models\User;
use Carbon\Carbon;
use Tests\TestCase;

class ExpenseTest extends TestCase
{
    protected function getTokenLogin(){
        $user     = User::factory()->create();
        $response = $this->post('/api/login', [
            "email"    => $user->email,
            "password" => "password"
        ]);

        $originalContent = $response->getOriginalContent();

        return $originalContent['token'];
    }
    /**
     * Test Create Expense Logged
     */
    public function testCreateExpense(): void
    {
        $data  = [
            'description' => 'Teste Unit createExpense',
            'date_expense' => Carbon::yesterday(),
            'value' => 12.5
        ];

        $token = $this->getTokenLogin();

        $response = $this->post('/api/expense/create', $data, [
            "Authorization" => "Bearer ".$token
        ]);

        $response->assertStatus(200);
        $response->assertJson(['status'  => 'success']);
        $response->assertJson(['message' => "User created with success."]);
    }

    /**
     * Test Create Expense Logged
     */
    public function testCreateExpenseUnlogged(): void
    {
        $data  = [
            'description' => 'Teste Unit createExpense',
            'date_expense' => Carbon::yesterday(),
            'value' => 12.5
        ];

        $response = $this->post('/api/expense/create', $data, [
            "Authorization" => "Bearer ".'asdfasdfasdfasdfasgasdgadg65465asda6516816w8e1615',
            "Accept"        => "application/json"
        ]);

        $response->assertStatus(401);
        $response->assertJson(['message' => "Unauthenticated."]);
    }

    /**
     * Test Create Expense Logged
     */
    public function testUpdateExpense(): void
    {
        $data  = [
            'description' => 'Teste 1',
            'date_expense' => Carbon::yesterday(),
            'value' => 12.5
        ];

        $token = $this->getTokenLogin();

        $response = $this->put('/api/expense/update/1', $data, [
            "Authorization" => "Bearer ".$token
        ]);

        $response->assertStatus(200);
        $response->assertJson(['status'  => 'success']);
        $response->assertJson(['message' => "User updated with success."]);
    }

    public function testDeleteExpense(): void
    {
        $token = $this->getTokenLogin();

        $response = $this->delete('/api/expense/delete/1', [], [
            "Authorization" => "Bearer ".$token
        ]);

        $response->assertStatus(200);
        $response->assertJson(['status'  => 'success']);
        $response->assertJson(['message' => "User deleted with success."]);
    }
}
