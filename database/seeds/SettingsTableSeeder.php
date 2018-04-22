<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Settings::create([
            'site_name' => 'Laravel blog',
            'address' => 'Serbia, Belgrade',
            'contact_number' => '064/ 3542-954',
            'contact_email' => 'nemanja.develop@gmail.com'
        ]);
    }
}
