<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $data = ['bird', 'cardinal', 'desk', 'ruler', 'paper'];

      foreach($data as $tagName) {
        $tag = new \Lichen\Tag();
        $tag->name = $tagName;
        $tag->save();
      }
    }
}
