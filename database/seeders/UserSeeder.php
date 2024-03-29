<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        User::factory(10)->create();
        //
        $admin = new Admin();
        $admin->login="adm@mail.com";
        $admin->password=Hash::make("xxx");
        $admin->save();
        //

        for($i=1; $i<=5; $i++)
        {
            User::create([
                'name' => "user$i",
                'password' => Hash::make("qwertyuiop$i"),
                'email' => "u$i@mail.com"
            ]);
        }
    }
}
