<?php
namespace App\Transformers;
use App\Regency;
use League\Fractal\TransformerAbstract;

class RegencyTransformer extends TransformerAbstract{

		public function transform(Regency $regency){

		return [
				'id' => $regency->id,
				'province_id' => $regency->province_id,
				'name' => $regency->name,
				'registered' => $regency->created_at->diffForHumans(),	
		];

		}


}

?>