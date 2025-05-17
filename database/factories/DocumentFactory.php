<?php

namespace Database\Factories;

use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\fa_IR\Person;
use Faker\Provider\fa_IR\Address;
use Faker\Provider\fa_IR\PhoneNumber;
use Faker\Provider\fa_IR\Company;
use Faker\Provider\fa_IR\Text;

class DocumentFactory extends Factory
{
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
        $htmlSnippets = [
            "<b>{$this->persianFaker->word}</b>",
            '<br>',
            '<br>',
            "<i>{$this->persianFaker->word}</i>",
            "<a href=\"{$this->faker->url}\">{$this->persianFaker->word}</a>",
            "<code>{$this->faker->sentence}</code>",
            "<pre><code>{$this->faker->paragraph}</code></pre>",
            "<strong>{$this->persianFaker->sentence}</strong>",
            "<em>{$this->persianFaker->sentence}</em>",
            "<u>{$this->persianFaker->word}</u>",
            "<span style=\"color:red\">{$this->persianFaker->word}</span>",
        ];

        shuffle($htmlSnippets);
        $htmlContent = implode(' ', $htmlSnippets);

        return [
            'title' => $this->persianFaker->sentence(3),
            'slug' => $this->faker->slug(),
            'content' => $htmlContent,
            'section_id' => $this->faker->numberBetween(1, Section::count()),
            'created_at' => now(),
            'updated_at' => now(),
            'user_id' => 'admin'
        ];
    }
}
