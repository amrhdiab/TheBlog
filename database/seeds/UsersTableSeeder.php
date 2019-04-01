<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Profile;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        //Create the site owner
        $siteOwner = User::create([
            'name'     => 'Owner',
            'email'    => 'owner@gmail.com',
            'password' => bcrypt(123123),
            'admin'    => 1,
            'owner'    => 1,
        ]);

        //Site owner profile
        Profile::create([
            'bio' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
           A amet dicta, esse exercitationem fugit ipsum, non omnis possimus 
           praesentium quaerat quisquam quos sit, soluta tempore totam veritatis 
           vero. Sed, ut.',

            'avatar'   => 'default-avatar.png',
            'facebook' => 'http://www.facebook.com/something',
            'youtube'  => 'http://www.youtube.com/something',
            'user_id'  => $siteOwner['id'],
        ]);


        //Create the admin
        $admin = User::create([
            'name'     => 'Admin Test',
            'email'    => 'admin@gmail.com',
            'password' => bcrypt(123123),
            'admin'    => 1,
            'owner'    => 0,
        ]);

        //Admin profile
        Profile::create([
            'bio' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
           A amet dicta, esse exercitationem fugit ipsum, non omnis possimus 
           praesentium quaerat quisquam quos sit, soluta tempore totam veritatis 
           vero. Sed, ut.',

            'avatar'   => 'default-avatar.png',
            'facebook' => 'http://www.facebook.com/admin',
            'youtube'  => 'http://www.youtube.com/admin',
            'user_id'  => $admin['id'],
        ]);


        //Create the author
        $author = User::create([
            'name'     => 'Author Test',
            'email'    => 'test@gmail.com',
            'password' => bcrypt(123123),
            'admin'    => 0,
            'owner'    => 0,
        ]);

        //Author profile
        Profile::create([
            'bio' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
           A amet dicta, esse exercitationem fugit ipsum, non omnis possimus 
           praesentium quaerat quisquam quos sit, soluta tempore totam veritatis 
           vero. Sed, ut.',

            'avatar'   => 'default-avatar.png',
            'facebook' => 'http://www.facebook.com/trdt',
            'youtube'  => 'http://www.youtube.com/trgdfg',
            'user_id'  => $author['id'],
        ]);
    }
}
