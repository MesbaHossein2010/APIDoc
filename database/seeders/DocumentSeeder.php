<?php

namespace Database\Seeders;

use App\Models\Document;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // In your DocumentSeeder.php
    public function run()
    {
        // Create in smaller batches
        $batchSize = 50; // Process 50 records at a time
        $totalRecords = 500;

        for ($i = 0; $i < $totalRecords; $i += $batchSize) {
            Document::factory()
                ->count(min($batchSize, $totalRecords - $i))
                ->create();
        }
    }
}
