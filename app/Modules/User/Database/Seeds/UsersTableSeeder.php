<?php
namespace App\Modules\User\Database\Seeds;

use App\Modules\User\Models\User;
use Illuminate\Database\Seeder;
use Hash;

class UsersTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'Subhash GC ',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'user_type' => 'super_admin',
            'password' => Hash::make('admin')
        ]);

    }
}
