<?php

namespace Database\Factories;

use App\Models\Expense;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExpenseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Expense::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => fake()->word(),
            'amount' => fake()->randomFloat(2, 50, 1000),
            'description' => fake()->sentence(3),
            'expense_date' => fake()->dateTimeBetween('-1 week', '+1 week'),
        ];
    }
}

 