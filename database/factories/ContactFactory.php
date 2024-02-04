<?php

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;

class ContactFactory extends Factory
{
    protected $model = Contact::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'contact' => $this->faker->randomNumber(9),
            'email' => $this->faker->unique()->safeEmail,
        ];
    }
}
