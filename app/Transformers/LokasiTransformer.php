<?php
namespace App\Transformers;
use App\Lokasi;
use League\Fractal\TransformerAbstract;

class LokasiTransformer extends TransformerAbstract{

		public function transform(Lokasi $lokasi){

		return [
				'id' => $lokasi->id,
				'nama' => $lokasi->nama,
				'deskripsi' => $lokasi->deskripsi,
				'alamat' => $lokasi->alamat,
				'district' => $lokasi->district,
				'city' => $lokasi->city,
				'image' => $lokasi->image,
				'lat' => $lokasi->lat,
				'lng' => $lokasi->lng,
				'registered' => $lokasi->created_at->diffForHumans(),	
		];

		}


}

?>