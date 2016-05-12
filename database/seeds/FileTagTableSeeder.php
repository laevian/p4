<?php

use Illuminate\Database\Seeder;

class FileTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      # First, create an array of all the books we want to associate tags with
      # The *key* will be the book title, and the *value* will be an array of tags.
      $files =[
          'Sample AI File' => ['bird', 'cardinal'],
          'Sample PSD File' => ['desk','ruler','paper'],
      ];

      # Now loop through the above array, creating a new pivot for each book to tag
      foreach($files as $name => $tags) {

          # First get the book
          $file = \Lichen\File::where('file_name','like',$name)->first();

          # Now loop through each tag for this book, adding the pivot
          foreach($tags as $tagName) {
              $tag = \Lichen\Tag::where('file_name','like',$tagName)->first();

              # Connect this tag to this book
              $file->tags()->save($tag);
          }

      }
    }
}
