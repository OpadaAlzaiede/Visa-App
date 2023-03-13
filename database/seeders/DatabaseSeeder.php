<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\RoomType;
use App\Models\User;
use App\Models\VisaType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => User::getUserRole()]);
        Role::create(['name' => User::getAdminRole()]);

        VisaType::create(['name' => "type1"]);
        VisaType::create(['name' => "type2"]);
        VisaType::create(['name' => "type3"]);

        RoomType::create(['name' => "type1"]);
        RoomType::create(['name' => "type2"]);
        RoomType::create(['name' => "type3"]);
    }
}
