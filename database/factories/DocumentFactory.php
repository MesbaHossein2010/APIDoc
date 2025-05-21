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
            "<b>" . $this->persianFaker->realText(10) . "</b>",
            '<br>',
            '<br>',
            "<i>" . $this->persianFaker->realText(10) . "</i>",
            "<a href=\"{$this->faker->url}\">" . $this->persianFaker->realText(10) . "</a>",
            "<code>{$this->faker->sentence}</code>",          // English inside code
            "<pre><code>{$this->faker->paragraph}</code></pre>", // English inside pre/code
            "<strong>" . $this->persianFaker->realText(20) . "</strong>",
            "<em>" . $this->persianFaker->realText(20) . "</em>",
            "<u>" . $this->persianFaker->realText(10) . "</u>",
            "<span style=\"color:red\">" . $this->persianFaker->realText(10) . "</span>",
        ];

        shuffle($htmlSnippets);
        $htmlContent = implode(' ', $htmlSnippets);

        return [
            'title' => $this->persianFaker->name(),
            'slug' => $this->faker->slug(3),
            'content' => $htmlContent,
            'section_id' => $this->faker->numberBetween(1, Section::count()),
            'created_at' => now(),
            'updated_at' => now(),
            'user_id' => 'admin'
        ];
    }
}
