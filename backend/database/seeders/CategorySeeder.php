<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $categories;

    public function __construct(Category $categories){
        $this->categories = $categories;
    }

    public function run()
    {
        $dummyCategories = [
            ['name'=>'aaa'],
            ['name'=>'bbb'],
            ['name'=>'ccc'],
            ['name'=>'ddd'],
        ];

        $this->categories->insert($dummyCategories);
    }
}
