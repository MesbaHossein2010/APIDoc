<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Document;
use App\Models\Section;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Document::query()->truncate();
        Section::query()->truncate();
        $this->call([
            SectionSeeder::class,
            DocumentSeeder::class,
        ]);
    }
}
