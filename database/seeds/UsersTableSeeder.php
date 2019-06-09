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
        $user = \App\User::create([
            'name' => 'super admin',
            'email' => 'mahdy@gmail.com',
            'id_number' => '56655611',
            'job' => 'super admin',
            'Section' => 'gdah',
            'birth_date' => '1995-2-22',
            'address' => 'elryad',
            'phone' => '01110043568',
            'mobile' => '0506659845',
            'salary' => '1500',
            'start' => '2018-2-25',
            'end' => '2022-2-24',

            'password' => bcrypt('123456'),
        ]);

        $user->attachRole('super_admin');

    }//end of run

}//end of seeder
