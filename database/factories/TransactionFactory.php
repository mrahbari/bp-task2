<?php
/**
 * @author Mojtaba Rahbari <mojtaba.rahbari@gmail.com | mojtabarahbari.ir>
 * @copyright Copyright &copy; from 2022 Mojtaba.
 * @version 1.0.0
 * @date 2022/02/06 23:00 PM
 */

namespace Database\Factories;

use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     * @throws Exception
     */
    public function definition(): array
    {
        return [
            "code" => 'T_' . $this->faker->unique()->postcode(),
            "amount" => $this->faker->randomDigit(),
            "user_id" => random_int(1, 1000),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
