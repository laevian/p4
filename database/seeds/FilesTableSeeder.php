<?php

use Illuminate\Database\Seeder;

class FilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     $project_id = \Lichen\Project::where('name','=','Alpha')->pluck('id')->first();

      DB::table('files')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'file_location' => '/uploads/' . 'File1.JPG',
        'file_name' => 'File1',
        'project_id' => $project_id,
      ]);

      $project_id = \Lichen\Project::where('name','=','Gamma')->pluck('id')->first();
      DB::table('files')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'file_location' => '/uploads/' . 'File2.jpg',
        'file_name' => 'File2',
        'project_id' => $project_id,
      ]);


    }
}
