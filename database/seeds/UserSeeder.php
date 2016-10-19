<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Membuat role admin
$adminRole = new Role();
$adminRole->name = "admin";
$adminRole->display_name = "Admin";
$adminRole->save();
// Membuat role nasabah
$memberRole = new Role();
$memberRole->name = "nasabah";
$memberRole->display_name = "Nasabah";
$memberRole->save();
// Membuat role banksampah
$bankRole = new Role();
$bankRole->name = "banksampah";
$bankRole->display_name = "Bank Sampah";
$bankRole->save();
// Membuat role pengepul
$pengepulRole = new Role();
$pengepulRole->name = "pengepul";
$pengepulRole->display_name = "Pengepul";
$pengepulRole->save();


// Membuat sample admin
$admin = new User();
$admin->name = 'Admin Larapus';
$admin->email = 'irfanprasetyo91@gmail.com';
$admin->password = bcrypt('rahasia');
$admin->save();
$admin->attachRole($adminRole);
    }
}
