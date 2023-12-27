<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Announcement>
 */
class AnnouncementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

    $faker = $this->faker;
    $title = $faker->sentence($nbWords = rand(3, 6));
    $slug = Str::slug($title);
    $content = "<p>" . $faker->paragraph($nbSentences = 3) . "</p>\n\n<p>" . $faker->paragraph($nbSentences = 3) . "</p>";
    $imageUrl = $faker->imageUrl($width = 720, $height = 480, 'logo'); // 'nature' adalah kata kunci (keyword) yang digunakan untuk gambar alam
        return [
            'user_id' => rand(2, 3),
            'cover_url' => 'storage/announcement/cover/cover.jpg',
            'title' => $title,
            'slug' => $slug,
            'body' => $content,
        ];
    }
}
