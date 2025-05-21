<?php

namespace Database\Factories;

use Faker\Provider\fa_IR\Address;
use Faker\Provider\fa_IR\Company;
use Faker\Provider\fa_IR\Person;
use Faker\Provider\fa_IR\PhoneNumber;
use Faker\Provider\fa_IR\Text;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Section>
 */
class SectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $persianFaker;
    public function __construct(...$args)
    {
        parent::__construct(...$args);

        $this->persianFaker = \Faker\Factory::create('fa_IR');
        $this->persianFaker->addProvider(new Person($this->persianFaker));
        $this->persianFaker->addProvider(new Address($this->persianFaker));
        $this->persianFaker->addProvider(new PhoneNumber($this->persianFaker));
        $this->persianFaker->addProvider(new Company($this->persianFaker));
        $this->persianFaker->addProvider(new Text($this->persianFaker));
    }

    public function definition(): array
    {
        return [
            'title' => $this->persianFaker->name(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
