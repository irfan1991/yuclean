<?php
namespace App\Transformers;
use App\OrderDetail;
use League\Fractal\TransformerAbstract;

class OrderDetailTransformer extends TransformerAbstract{

		public function transform(OrderDetail $ortail){

		return [
				'id' => $ortail->id,
				'order_id' => $ortail->order_id,
				'barang_id' => $ortail->barang_id,
				'quantity' => $ortail->quantity,
				'price' => $ortail->price,
				'fee' => $ortail->fee,
				'total_price' => $ortail->total_price,
				'registered' => $ortail->created_at->diffForHumans(),	
		];

		}


}

?>