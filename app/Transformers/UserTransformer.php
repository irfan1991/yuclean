<?php
namespace App\Transformers;
use App\User;
use App\Transformers\HistoriTransormer;
use League\Fractal\TransformerAbstract;
use Auth;

class UserTransformer extends TransformerAbstract{

	protected $availableIncludes = [
		'transaksi'
	];

		public function transform(User $user){

		return [
				'id' => $user->id,
				'name' => $user->name,
				'username' => $user->username,
				'email' => $user->email,
				'rt' => $user->rt,
				'rw' => $user->rw,
				'kelurahan' => $user->kelurahan,
				'image' => $user->image,
				'api_token' => $user->api_token,
				'registered' => $user->created_at->diffForHumans(),	
		];

		}

		public function includeTransaksis(User $user)
		{
				$transaksi = $user->$transaksi;
				return $this->collection($transaksi, new HistoriTransormer);
		}

}

?>