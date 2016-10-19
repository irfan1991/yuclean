<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use fpdf;
use App\Http\Requests;
use Auth;
use App\User;
use App\Tabungan;
class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function pdfLaporanNabung(Request $request,$id)
    {
    $nabung = \DB::table('nabungs')->where('nasabah_id','=',$id)->get();
    $user = User::find($id);
   $data = $request->jenis_sampah;
        $harga = \DB::table('sampahs')->where('harga','=',$data)->get();
       $transaksi = \DB::table('nabungs')
                   ->join('users','users.id','=','nabungs.nasabah_id')
                   ->select('users.username','users.name','users.saldo_terakhir','nabungs.created_at','nabungs.jenis_transaksi',
                            'nabungs.jumlah','nabungs.saldo')
                   ->where('nabungs.nasabah_id','=',$id)
                   ->get();


         $pdf = new \fpdf\FPDF();
        $pdf->AddPage();
        $pdf->SetTitle('Tabungan '.$user->name);
        $pdf->SetFont('Times','B',12);
        $pdf->Cell(40,'','Tabungan Milik ',0,0);
        $pdf->Cell(15,'  ',$user->name,0,1,'B');
        $pdf->Cell(60,6,'' ,'',1);
        $pdf->Cell(40,'','Nomor Telepon ',0,0);
        $pdf->Cell(15,'  ',$user->username,0,1,'B');
         $pdf->Cell(60,6,'' ,'',1);

        $pdf->Cell(8,8,'No',1,0);
        $pdf->Cell(25,8,'Tanggal',1,0,'C');
        $pdf->Cell(30,8,'Jenis Transaksi',1,0,'C');
        $pdf->Cell(25,8,'Saldo',1,0,'C');
        $pdf->Cell(25,8,'Operator',1,1,'C');
      

          $no=1;
         $pdf->SetFont('Times','',11);
         if (!empty($nabung) ) {

         foreach ($transaksi as $t) {
        $pdf->Cell(8,8,$no,1,0,'C');
        $pdf->Cell(25,8,tgl_indo($t->created_at),1,0,'C');
         $pdf->Cell(30,8,$t->jenis_transaksi,1,0,'C');
        $pdf->Cell(25,8,'Rp '.number_format($t->saldo),1,0,'C');
        $pdf->Cell(25,8,Auth::user()->name,1,1,'C');
        $no++;
        }
        
 $pdf->Cell(60,4,'' ,'',1);
 $pdf->Cell(20,'','Saldo Akhir ',0,0);
 $pdf->SetFont('Times','B',12);
  $pdf->Cell(15,'','Rp '.number_format($t->saldo_terakhir),0,0,'B');
        $pdf->Output();
        die;

         }else {
            echo "Maaf Anda Belum Punya Saldo";
         }
         
      
    }

     public function excel()
    {
        
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
