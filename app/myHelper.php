<?php

use Carbon\Carbon;


function tgl_indo($date)
{
	// 2015-10-10;

	$timestamp = substr($date,8,2).'/'.substr($date,5,2).'/'.substr($date, 0,4);
$data = Carbon::createFromFormat('d/m/Y',$timestamp)->toFormattedDateString();
return $data;

}


function bulan($bulan)
{
	if($bulan=='10')
	{
		return 'November';
	}
}

?>