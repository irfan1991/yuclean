<?php
namespace App\Transformers;
use App\TarikDana;
use League\Fractal\TransformerAbstract;

class TarikDanaTransformer extends TransformerAbstract{

		public function transform(TarikDana $tarikdana){

		return [
				
				
				'message' => 'Debit Berhasil',	
				
		];

		}


}

?>