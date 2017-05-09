<?php
namespace App\Transformers;
use App\Province;
use League\Fractal\TransformerAbstract;

class ProvinceTransformer extends TransformerAbstract{

		public function transform(Province $province){

		return [
				'id' => $province->id,
				'name' => $province->name,
				'registered' => $province->created_at->diffForHumans(),	
		];

		}


}

?>