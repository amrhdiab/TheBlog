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
        \App\Setting::create([
            'site_name' => 'The Blog',
            'contact_number' => '999 999 999',
            'contact_email' => 'something@theblog.com',
            'address' => '25 Gizah, cairo, Egypt',
        ]);
    }
}
