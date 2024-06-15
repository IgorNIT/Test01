<?php
namespace Modules\News\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Modules\News\Enums\NewsStatus;
use Modules\News\Models\News;

class NewsFactory extends Factory
{

    protected $model = News::class;

    public function definition(): array
    {
        $title = $this->faker->sentence();
        return [
            'title'             => $title,
            'url'               => Str::slug($title),
            'short_description' => $this->faker->text(50),
            'description'       => $this->faker->paragraphs(3, true),
            'status'            => NewsStatus::ACTIVE->value,
            'created_at'        => $this->faker->dateTimeThisMonth,
            'updated_at'        => now(),
        ];
    }
}
