<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Folder;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        /**
         *  Reference: https://github.com/fzaninotto/Faker#basic-usage
         * 
         *  Faker library has functions that return as array which can cause issues when creating values for DB. 
         *  Have to specify to return as text. Example below. 
         */

        return [
            'title' => fake()->words('3', true),
            'description' => fake()->sentences(2, true),
            'version' => 1,
            'body_text' => fake()->paragraphs(3, true),
            'body_html' => fake()->randomHtml(),
            'require_acknowledgements' => false,
            'status_id' => 1,
            'user_id' => User::inRandomOrder()->first()->id,
            'folder_id' => Folder::inRandomOrder()->first()->id
        ];
    }
}
