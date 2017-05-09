<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Addres;
use App\Province;
use App\Regency;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Province::populate();
        Regency::populate();

        // sample address for customer
        $customer = User::where('username', '01102130345')->first();
        $address1 = Addres::create([
            'user_id' => $customer->id,
            'name' => 'Budi',
            'detail' => 'Kp Cipadung RT 4 RW 9 Ds Cipadung',
            // Kota Cimahi, Jawa Barat,
            'regency_id' => 107,
            'phone' => '87823451238',
        ]);

        $address2 = Addres::create([
            'user_id' => $customer->id,
            'name' => 'Susi',
            'detail' => 'Kp Karang Jati RT 19 RW 23 Ds Sukamahi',
            // Kota Bekasi, Jawa Barat,
            'regency_id' => 55,
            'phone' => '87823451238',
        ]);
    }
}
