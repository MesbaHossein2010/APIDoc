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
    public function definition(): array
    {
        $faker = \Faker\Factory::create('fa_IR');
        $faker->addProvider(new Person($faker));
        $faker->addProvider(new Address($faker));
        $faker->addProvider(new PhoneNumber($faker));
        $faker->addProvider(new Company($faker));
        $faker->addProvider(new Text($faker));

        // Generate rich Persian content
        $persianParagraphs = [];
        for ($i = 0; $i < rand(2, 5); $i++) {
            $persianParagraphs[] = "<p>{$faker->realText(rand(200, 500))}</p>";
        }

        $htmlContent = implode("\n", [
            "<h2>{$faker->sentence(4)}</h2>",
            ...$persianParagraphs,
            "<ul>" . implode('', array_map(fn() => "<li>{$faker->sentence(6)}</li>", range(1, rand(3, 7)))) . "</ul>",
            "<blockquote>{$faker->sentence(10)}</blockquote>",
            "<p>{$faker->realText(300)}</p>"
        ]);

        return [
            'title' => $faker->sentence(3),
            'slug' => $faker->unique()->slug(3),
            'content' => $htmlContent,
            'section_id' => Section::inRandomOrder()->value('id') ?? Section::factory(),
            'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => now(),
            'user_id' => 'admin'
        ];
    }
}
