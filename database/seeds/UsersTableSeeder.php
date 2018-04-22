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
        $user = App\User::create([

            'name' => 'Nikola',
            'email' => 'nik@mail.com',
            'password' => bcrypt('123qwe'),
            'admin' => 1

        ]);

        App\Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatars/1.png',
            'about' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A alias aliquam dolores eos eum eveniet inventore ipsa, laudantium odio officia, quasi quis repellendus sequi soluta suscipit, tempora tempore totam velit. ',
            'facebook' => 'http://facebook.com',
            'youtube' => 'http://youtube.com'
        ]);
    }
}
