<?php

use Illuminate\Database\Seeder;
use App\Barang;
use App\Kategori;
class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // sample Kategori
        $vas = Kategori::create(['title' => 'Bunga']);
        $vas->childs()->saveMany([
            new Kategori(['title' => 'Vas Bunga']),
            new Kategori(['title' => 'Setangkai Bunga']),
            new Kategori(['title' => 'Bingkisan Bunga']),
            new Kategori(['title' => 'Rangkaian Bunga'])
        ]);

        $aksesoris = Kategori::create(['title' => 'Aksesoris']);
        $aksesoris->childs()->saveMany([
            new Kategori(['title' => 'Tas']),
            new Kategori(['title' => 'Gelang']),
            new Kategori(['title' => 'Kantong']),
        ]);

        // sample Barang
        $bunga = Kategori::where('title', 'Bunga')->first();
        $vasbunga = Kategori::where('title', 'Vas Bunga')->first();
        $vas1 = Barang::create([
            'name' => 'Vas Bunga Riana ',
            'model' => 'Kerajinan Bank Sampah Melati Depok Cimanggis',
            'photo'=>'images.jpg',
            'weight' => rand(1,3) * 1000,
            'price' => 340000]);
        $vas2 = Barang::create([
            'name' => 'Vas Bunga Putih ',
            'model' => 'Kerajinan Bank Sampah Melati Depok Cinere',
            'photo'=>'images.jpg',
            'weight' => rand(1,3) * 1000,
            'price' => 420000]);
        $vas3 = Barang::create([
            'name' => 'Paket Vas Bunga Bandung',
            'model' => 'Kerajinan Bank Sampah Melati Bandung',
            'photo'=>'images.jpg',
            'weight' => rand(1,3) * 1000,
            'price' => 360000]);
        $bunga->products()->saveMany([$vas1, $vas2, $vas3]);
        $vasbunga->products()->saveMany([$vas1, $vas2]);

        $tas = Kategori::where('title', 'Tas')->first();
        $kantong = Kategori::where('title', 'Kantong')->first();
        $tas1 = Barang::create([
            'name' => 'Tas Kerajinan Unik ',
            'model' => 'Kerajinan Bank Sampah Melati Depok Cimanggis',
            'photo'=>'tas-daur-ulang.jpg',
            'weight' => rand(1,3) * 1000,
            'price' => 720000]);
        $tas2 = Barang::create([
            'name' => 'Tas Kerajinan Banyak Warna',
            'model' => 'Kerajinan Bank Sampah Melati Depok Cinere',
            'photo'=>'tas-daur-ulang.jpg',
            'weight' => rand(1,3) * 1000,
            'price' => 380000]);
        $tas3 = Barang::create([
            'name' => 'Tas Kerajinan Banyak Meriah',
            'model' => 'Kerajinan Bank Sampah Melati Depok Cinere',
            'photo'=>'tas-daur-ulang.jpg',
            'weight' => rand(1,3) * 1000,
            'price' => 1200000]);
        $tas->products()->saveMany([$tas1, $tas3]);
        $kantong->products()->saveMany([$tas2, $tas3]);

        // copy image sample to public folder
        $from = database_path() . DIRECTORY_SEPARATOR . 'seeds' .
            DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR;
        $to = public_path() . DIRECTORY_SEPARATOR . 'images\barang' . DIRECTORY_SEPARATOR;
        File::copy($from . 'images.jpg', $to . 'images.jpg');
        File::copy($from . 'tas-daur-ulang.jpg', $to . 'tas-daur-ulang.jpg');
    }
    
}
