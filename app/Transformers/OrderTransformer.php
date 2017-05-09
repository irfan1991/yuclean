<?php
namespace App\Transformers;
use App\Order;
use League\Fractal\TransformerAbstract;

class OrderTransformer extends TransformerAbstract{

		public function transform(Order $order){

		return [
				'id' =>$order->id,
				'user_id' =>$order->user_id,
				'address_id' =>$order->address_id,
				'status' =>$order->status,
				'bank' =>$order->bank,
				'sender' =>$order->sender,
				'total_payment' =>$order->total_payment,
				'registered' =>$order->created_at->diffForHumans(),	
		];

		}


}

?>