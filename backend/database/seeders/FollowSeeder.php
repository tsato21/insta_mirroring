<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Follow;

class FollowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $follows;

    public function __construct(Follow $follows){
        $this->follows = $follows;
    }
    
    public function run()
    {
        $dummyFollows = [
            ['follow_id'=>3, 'following_id'=>2],
            ['follow_id'=>4, 'following_id'=>5],
            ['follow_id'=>2, 'following_id'=>4]
        ];

        $this->follows->insert($dummyFollows);
    }
}
