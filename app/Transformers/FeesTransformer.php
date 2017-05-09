<?php
namespace App\Transformers;
use App\Fee;
use League\Fractal\TransformerAbstract;

class FeesTransformer extends TransformerAbstract{

		public function transform(Fee $fee){

		return [
				'id' => $fee->id,
				'origin' => $fee->origin,
				'destination' => $fee->destination,
				'courier' => $fee->courier,
				'service' => $fee->service,
				'weight' => $fee->weight,
				'cost' => $fee->cost,
				'registered' => $fee->created_at->diffForHumans(),	
		];

		}


}

?>