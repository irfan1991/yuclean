<?php
namespace App\Transformers;
use App\Addres;
use League\Fractal\TransformerAbstract;

class AddresstTransformer extends TransformerAbstract{

		public function transform(Addres $addres){

		return [
				'id' => $addres->id,
				'user_id' => $addres->user_id,
				'name' => $addres->name,
				'detail' => $addres->detail,
				'regency_id' => $addres->regency_id,
				'registered' => $addres->created_at->diffForHumans(),	
		];

		}


}

?>