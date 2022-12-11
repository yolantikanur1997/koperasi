<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Faktur;
use App\Models\Pembayaran;
use App\Models\Pengguna;
use App\Models\Tagihan;
use App\Models\Tujuan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    public function index(){
        $pembayaran = Pembayaran::select('tbl_pembayaran.*',
        'tbl_pembayaran.id as id_pembayaran','tbl_pembayaran.tanggal as tanggal_pembayaran',
        'tbl_pembayaran.status as status_pembayaran',
        'tbl_pengguna.nama as nama_pic','tbl_faktur.*','tbl_bank.*',
        'tbl_tagihan.*','tbl_tujuan.nama as nama_tujuan')
        ->join('tbl_faktur', 'tbl_faktur.id', '=', 'tbl_pembayaran.id_faktur')
        ->join('tbl_tagihan', 'tbl_tagihan.id', '=', 'tbl_faktur.id_tagihan')
        ->join('tbl_tujuan', 'tbl_tujuan.id', '=', 'tbl_tagihan.id_tujuan')
        ->join('tbl_bank', 'tbl_bank.id', '=', 'tbl_pembayaran.id_bank')
        ->join('tbl_pengguna', 'tbl_pengguna.id', '=', 'tbl_pembayaran.id_pengguna')
        ->where('tbl_pembayaran.status', 'Proses')
        ->orWhere('tbl_pembayaran.status', 'Disetujui')
        ->orderBy('tbl_pembayaran.created_at', 'desc')->paginate(10); 
        return view('pembayaran/index',['title' => 'Data Pembayaran','pembayaran' => $pembayaran]);
    }

    
    public function cari(Request $request)
	{
        
        $cari = $request->cari;
        
		$pembayaran = DB::table('tbl_pembayaran')
        ->select('tbl_pembayaran.*','tbl_pembayaran.tanggal as tanggal_pembayaran',
        'tbl_pembayaran.status as status_pembayaran','tbl_pembayaran.id as id_pembayaran','tbl_pengguna.nama as nama_pic',
        'tbl_tujuan.nama as nama_tujuan','tbl_tagihan.*','tbl_bank.*','tbl_faktur.*')
        ->join('tbl_pengguna', 'tbl_pengguna.id', '=', 'tbl_pembayaran.id_pengguna')
        ->join('tbl_bank', 'tbl_bank.id', '=', 'tbl_pembayaran.id_bank')
        ->join('tbl_faktur', 'tbl_faktur.id', '=', 'tbl_pembayaran.id_faktur')
        ->join('tbl_tagihan', 'tbl_tagihan.id', '=', 'tbl_faktur.id_tagihan')
        ->join('tbl_tujuan', 'tbl_tujuan.id', '=', 'tbl_tagihan.id_tujuan')
		->where('tbl_faktur.nomor_faktur','like',"%".$cari."%")
		->orWhere('tbl_pengguna.nama','like',"%".$cari."%")
		->orWhere('tbl_tujuan.nama','like',"%".$cari."%")
		->orWhere('tbl_tagihan.nilai_tagihan','like',"%".$cari."%")
		->orWhere('tbl_tagihan.nomor_tagihan','like',"%".$cari."%")
		->paginate();
        
        return view('pembayaran/index',['title' => 'Data Pembayaran','pembayaran' => $pembayaran]);
        
	}
    public function cariStatus(Request $request)
    {
    
        $cari = $request->cari;
 
        $pembayaran = DB::table('tbl_pembayaran')
        ->select('tbl_pembayaran.*','tbl_pembayaran.tanggal as tanggal_pembayaran',
        'tbl_pembayaran.status as status_pembayaran','tbl_pembayaran.id as id_pembayaran','tbl_pengguna.nama as nama_pic',
        'tbl_tujuan.nama as nama_tujuan','tbl_tagihan.*','tbl_bank.*','tbl_faktur.*')
        ->join('tbl_pengguna', 'tbl_pengguna.id', '=', 'tbl_pembayaran.id_pengguna')
        ->join('tbl_bank', 'tbl_bank.id', '=', 'tbl_pembayaran.id_bank')
        ->join('tbl_faktur', 'tbl_faktur.id', '=', 'tbl_pembayaran.id_faktur')
        ->join('tbl_tagihan', 'tbl_tagihan.id', '=', 'tbl_faktur.id_tagihan')
        ->join('tbl_tujuan', 'tbl_tujuan.id', '=', 'tbl_tagihan.id_tujuan')
		->where('tbl_pembayaran.status','like',"%".$cari."%")
		->paginate();
        
        return view('pembayaran/index',['title' => 'Data Pembayaran','pembayaran' => $pembayaran]);
        
    }
    
    public function form(){

        $pengguna = Pengguna::select('*')
        ->get();

        $faktur = Faktur::select('*')
        ->where('status','Disetujui')
        ->get();

        $bank = Bank::select('*')
        ->get();


        return view('pembayaran/pembayaran_add',[
            'title' => 'Pembayaran',
            'pengguna' => $pengguna,
            'faktur' => $faktur,
            'bank' => $bank
        ]);
    }

    public function add(Request $request){

        $validateData = $request->validate([
            'id_faktur' => 'required',
			'id_bank' => 'required',
			'id_pengguna' => 'required',
			'tanggal' => 'required',
			'status' => 'required',
		]);

		Pembayaran::create($validateData);

		Faktur::find($request->id_faktur)->update(['status' => 'Closed']);

		return redirect('pembayaran/form')->with('Sukses', 'Data Pembayaran Tersimpan');
    }

    public function edit($id)
	{

        $pengguna = Pengguna::select('*')
        ->get();

        $faktur = Faktur::select('*')
        ->join('tbl_pembayaran', 'tbl_faktur.id', '=', 'tbl_pembayaran.id_faktur')
        ->where('tbl_pembayaran.id',$id)
        ->get();

        $bank = Bank::select('*')
        ->get();

		$pembayaran = Pembayaran::findOrFail($id);
        
		return view('pembayaran.pembayaran_edit',[
            'pengguna' => $pengguna,
            'faktur' => $faktur,
            'bank' => $bank,
            'pembayaran' => $pembayaran
        ]);
	}
    
    public function update(Request $request, $id)
	{		
		$pembayaran = Pembayaran::find($id)->update($request->all()); 
				
		return redirect('pembayaran')->with('Edit', 'Data Pembayaran Diedit');
	}
    
    public function hapus($id)
	{

            $pembayaran = Pembayaran::where('id',$id)->delete();
			return redirect('pembayaran')->with('Hapus', 'Data Pembayaran Dihapus');

	}

         // cetak data per id
         public function cetak($id)
         {
     
             // $tagihan = Tagihan::all();
             $pembayaran = Pembayaran::select('tbl_pembayaran.*',
             'tbl_pembayaran.id as id_pembayaran','tbl_pembayaran.tanggal as tanggal_pembayaran',
             'tbl_pembayaran.status as status_pembayaran',
             'tbl_pengguna.nama as nama_pic','tbl_faktur.*','tbl_bank.*',
             'tbl_tagihan.*','tbl_tujuan.nama as nama_tujuan',
             'tbl_bank.*','tbl_bank.nama as nama_bank')
             ->join('tbl_faktur', 'tbl_faktur.id', '=', 'tbl_pembayaran.id_faktur')
             ->join('tbl_tagihan', 'tbl_tagihan.id', '=', 'tbl_faktur.id_tagihan')
             ->join('tbl_tujuan', 'tbl_tujuan.id', '=', 'tbl_tagihan.id_tujuan')
             ->join('tbl_bank', 'tbl_bank.id', '=', 'tbl_pembayaran.id_bank')
             ->join('tbl_pengguna', 'tbl_pengguna.id', '=', 'tbl_pembayaran.id_pengguna')
             ->where('tbl_pembayaran.id',$id)
             ->get();
     
             // print_r($tagihan);exit;
      
             $pdf = Pdf::loadview('pembayaran/pembayaran_pdf',['pembayaran'=>$pembayaran]);
             return $pdf->stream();
             // return $pdf->download('laporan-tagihan-pdf');
     
         }
}
