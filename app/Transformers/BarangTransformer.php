<?php
namespace App\Transformers;
use App\Barang;
use League\Fractal\TransformerAbstract;

class BarangTransformer extends TransformerAbstract{

		public function transform(Barang $barang){

		return [
				'id' => $barang->id,
				'name' => $barang->name,
				'photo' => $barang->photo,
				'model' => $barang->model,
				'price' => $barang->price,
				'weight' => $barang->weight,
				'registered' => $barang->created_at->diffForHumans(),	
		];

		}


}

?>