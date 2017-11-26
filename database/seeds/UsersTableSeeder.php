<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(User::class)->times(10)->make();
        User::insert($users->makeVisible(['password', 'remember_token'])->toArray());

        $user = User::find(1);
        $user->username = 'mike';
        $user->email = 'mike@gmail.com';
        $user->password = bcrypt('password');
        $user->is_admin = true;
        $user->save();
    }
}
