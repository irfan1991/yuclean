<?php
namespace App\Transformers;
use App\User;
use App\Tabungan;
use League\Fractal\TransformerAbstract;
use Illuminate\Http\Request;


class HistoriTransformer extends TransformerAbstract{

		public function transform(Tabungan $tabungan){

		return [
				'id' => $tabungan->id,
				'nasabah_id' => $tabungan->nasabah_id,
				'jumlah' => $tabungan->jumlah,
				'jenis_transaksi' => $tabungan->jenis_transaksi,
				'saldo' => $tabungan->saldo,
				'operator' => $tabungan->operator,
				'sampah_id' => $tabungan->sampah_id,
				'tanggal' => $tabungan->created_at->diffForHumans(),	
		];

		}


}

?>