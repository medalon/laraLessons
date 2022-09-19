<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Company;
use App\Models\Contact;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'first_name' => fake()->firstName(),
                'last_name' => fake()->lastName(),
                'phone' => fake()->tollFreePhoneNumber(),
                'email' => fake()->email(),
                'address' => fake()->address(),
                'company_id' => Company::pluck('id')->random(),
                
        ];
    }
}
