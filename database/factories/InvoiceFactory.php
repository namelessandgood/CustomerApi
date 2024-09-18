<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

	public function definition(): array
    {
		/**
		 * $table->integer('customer_id');

			$table->integer('amount');
			$table->string("status");

			$table->dateTime('billed_dated');
			$table->dateTime('paid_dated')->nullable();


		 */

		$status=$this->faker->randomElement(['B', 'P','V']);

		return [
            'customer_id' => \App\Models\Customer::factory(),
			'amount' => $this->faker->numberBetween(100, 20000),
			'status' => $status,
			'billed_dated' => $this->faker->dateTimeThisDecade(),
			'paid_dated' => $status=='P'? $this->faker->dateTimeThisDecade():NULL ,
        ];
    }
}