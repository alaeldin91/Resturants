<?php

namespace Database\Seeders;

use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Seeder;

class Owner extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return ([User::Create([
            'name' => 'Hussam ZenAlabdin Musa',
            'email' => 'Hussam2017@gmail.com',
            'password' => bcrypt('1234'),
            'role' => 'owner'])

        ]);
    }
}
