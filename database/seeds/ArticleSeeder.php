<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Article\Entities\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Article::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        factory('Modules\Article\Entities\Article', 20)->create();
    }
}
