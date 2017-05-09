<?php
namespace App\Transformers;
use App\Sampah;
use League\Fractal\TransformerAbstract;

class SampahTransformer extends TransformerAbstract{

		public function transform(Sampah $sampah){

		return [
				'id' => $sampah->id,
				'satuan' => $sampah->satuan,
				'potongan' => $sampah->potongan,
				'harga' => $sampah->harga,
				'nama' => $sampah->nama,
		];

		}


}

?>