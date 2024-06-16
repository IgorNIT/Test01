<?php

namespace Modules\News\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\News\Models\News;

class NewsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        News::factory()->count(1000)->create();
    }
}
