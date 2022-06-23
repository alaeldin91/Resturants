<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class Admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return ([
          User::create([
              'name'=>'alaeldin Musa',
              'email'=>'alaeldinmusa91@gmail.com',
              'password'=>bcrypt('1234'),
              'role'=>'Administrator',

            ])

        ]);
    }
}
