<?php

namespace Database\Factories;

use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Document>
 */
class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $htmlSnippets = [
            "<b>{$this->faker->word}</b>",
            '<br>',
            '<br>',
            '<br>',
            '<br>',
            '<br>',
            '<br>',
            '<br>',
            "<i>{$this->faker->word}</i>",
            "<a href=\"{$this->faker->url}\">{$this->faker->word}</a>",
            "<code>{$this->faker->sentence}</code>",
            "<pre><code>{$this->faker->paragraph}</code></pre>",
            "<strong>{$this->faker->sentence}</strong>",
            "<em>{$this->faker->sentence}</em>",
            "<u>{$this->faker->word}</u>",
            "<span style=\"color:red\">{$this->faker->word}</span>",
        ];

        // Shuffle and join a few snippets together
        shuffle($htmlSnippets);
        $htmlContent = implode(' ', $htmlSnippets);

        return [
            'title' => $this->faker->name(),
            'slug' => $this->faker->slug(),
            'content' => $htmlContent,
            'section_id' => $this->faker->numberBetween(1, Section::all()->count()),
            'created_at' => now(),
            'updated_at' => now(),
            'user_id' => 'admin'
        ];
    }
}
