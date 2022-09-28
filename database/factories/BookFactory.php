<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => fake()->name(),
            'isbn' => '074-53269-123',
            'content' => fake()->sentence(100),
            'author_id' => 1,
            'picture' => '/assets/img/book.jpg',
            'page_count' => 1,
            'size_id' => 1,
            'script_id' => 1,
            'binding_id' => 1,
            'publisher_id' => 1,
            'publish_date' => '2014-09-01',
            'total_count' => 1,
            'category_id' => 1,
            'genre_id' => 1,
            'checkouts_count' => 1,
            'reserved_count' => 1
        ];
    }
}
