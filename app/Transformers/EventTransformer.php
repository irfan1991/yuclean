<?php
namespace App\Transformers;
use App\Event;
use League\Fractal\TransformerAbstract;

class EventTransformer extends TransformerAbstract{

		public function transform(Event $event){

		return [
				'id' => $event->id,
				'judul' => $event->judul,
				'konten' => $event->konten,
				'tanggal' => $event->tanggal,
				'image' => $event->image,
				'registered' => $event->created_at->diffForHumans(),	
		];

		}


}

?>