<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $posts;

    public function __construct(Post $posts)
    {
        $this->posts = $posts;
    }

    public function run()
    {
        $dummy_posts= [
            [
                'id' => 1,
                'user_id' => 2,
                'image' => 'image1.jpg',
                'description' => 'This is the first post',
            ],
            [
                'id' => 2,
                'user_id' => 2,
                'image' => 'image2.jpg',
                'description' => 'This is the first post',
            ],
            [
                'id' => 3,
                'user_id' => 3,
                'image' => 'image3.jpg',
                'description' => 'This is the first post',
            ],
        ];

        $this->posts->insert($dummy_posts);

    }
}
