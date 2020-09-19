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
        $date = date('Y-m-d H:i:s');

        $data = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
                'email_verified_at' => $date,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'Faisal Siddiq',
                'email' => 'faisal.siddiq87@gmail.com',
                'password' => bcrypt('123456'),
                'email_verified_at' => $date,
                'created_at' => $date,
                'updated_at' => $date
            ]
        ];

        foreach ($data as $dat) {
            DB::table('users')->insert($dat);
        }
    }   
}
