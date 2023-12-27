<?php

namespace Database\Factories;

use App\Models\Visitor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Visitor>
 */
class VisitorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = $this->faker;
        $ipAddress = $faker->ipv4;
        $date = $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d');

        while (!Visitor::isUniqueIPDateCombination($ipAddress, $date)) {
            $date = $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d');
        }

        return [
            'ip' => $ipAddress,
            'date_visit' => $date,
        ];
    }
}
