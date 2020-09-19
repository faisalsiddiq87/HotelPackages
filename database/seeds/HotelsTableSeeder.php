<?php

use Illuminate\Database\Seeder;

class HotelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date =  date('Y-m-d H:i:s');

        $data = [
            [
                'name' => 'Four Seasons Hotel Kuala Lumpur',
                'address' => '145, Jalan Ampang, Kuala Lumpur, 50450 Kuala Lumpur, Malaysia',
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'citizenM Kuala Lumpur Bukit Bintang',
                'address' => '128 Jalan Pudu, Bukit Bintang, Bukit Bintang, 55100 Kuala Lumpur, Malaysia',
                'created_at' =>  $date,
                'updated_at' => $date
            ],
            [
                'name' => 'The RuMa Hotel and Residences',
                'address' => '7 Jalan Kia Peng, 50450 Kuala Lumpur, Malaysia',
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'Hotel Stripes Kuala Lumpur, Autograph Collection',
                'address' => '25 Jalan Kamunting, Chow Kit, 50300 Kuala Lumpur, Malaysia',
                'created_at' =>  $date,
                'updated_at' => $date
            ],
            [
                'name' => 'Element Kuala Lumpur by Westin',
                'address' => 'Ilham Tower, Jalan Binjai, 50450 Kuala Lumpur, Malaysia',
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'The Majestic Hotel Kuala Lumpur, Autograph Collection',
                'address' => 'No.5, Jalan Sultan Hishamuddin, City Centre, 50000 Kuala Lumpur, Malaysia',
                'created_at' =>  $date,
                'updated_at' => $date
            ]
        ];

        foreach ($data as $dat) {
            DB::table('hotels')->insert($dat);
        }
    }
}
