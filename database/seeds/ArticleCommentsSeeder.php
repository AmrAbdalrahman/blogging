<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Article\Entities\ArticleComments;

class ArticleCommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        ArticleComments::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        factory('Modules\Article\Entities\ArticleComments', 10)->create();
    }
}
