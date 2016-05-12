<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = \Lichen\User::firstOrCreate(['email' => 'jill@harvard.edu']);
      $user->name = 'Jill';
      $user->email = 'jill@harvard.edu';
      $user->password = \Hash::make('helloworld');
      $user->save();

      $user = \Lichen\User::firstOrCreate(['email' => 'jamal@harvard.edu']);
      $user->name = 'Jamal';
      $user->email = 'jamal@harvard.edu';
      $user->password = \Hash::make('helloworld');
      $user->save();
    }
}
