<?php

namespace App\Http\Controllers;

use App\Models\Faktur;
use App\Models\Pengguna;
use App\Models\Tagihan;
use App\Models\Tujuan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FakturController extends Controller
{
    public function index(){
        $faktur = Faktur::select('tbl_faktur.*','tbl_faktur.id as id_faktur','tbl_faktur.status as status_faktur','tbl_pengguna.nama as nama_pic','tbl_tagihan.*','tbl_tujuan.nama as nama_tujuan')
        ->join('tbl_pengguna', 'tbl_pengguna.id', '=', 'tbl_faktur.id_pengguna')
        ->join('tbl_tagihan', 'tbl_tagihan.id', '=', 'tbl_faktur.id_tagihan')
        ->join('tbl_tujuan', 'tbl_tujuan.id', '=', 'tbl_tagihan.id_tujuan')
        ->where('tbl_faktur.status','Proses')
        ->orWhere('tbl_faktur.status','Disetujui')
        ->orderBy('tbl_faktur.created_at', 'desc')->paginate(10);

        return view('faktur/index',['title' => 'Data Faktur','faktur' => $faktur]);
    }
    public function cari(Request $request)
	{
	
		$cari = $request->cari;
 
		$faktur = DB::table('tbl_faktur')
        ->select('tbl_faktur.*','tbl_faktur.id as id_faktur','tbl_faktur.status as status_faktur','tbl_pengguna.nama as nama_pic','tbl_tujuan.nama as nama_tujuan','tbl_tagihan.*')
        ->join('tbl_pengguna', 'tbl_pengguna.id', '=', 'tbl_faktur.id_pengguna')
        ->join('tbl_tagihan', 'tbl_tagihan.id', '=', 'tbl_faktur.id_tagihan')
        ->join('tbl_tujuan', 'tbl_tujuan.id', '=', 'tbl_tagihan.id_tujuan')
		->where('tbl_faktur.nomor_faktur','like',"%".$cari."%")
		->orWhere('tbl_pengguna.nama','like',"%".$cari."%")
		->orWhere('tbl_tujuan.nama','like',"%".$cari."%")
		->orWhere('tbl_tagihan.nilai_tagihan','like',"%".$cari."%")
		->orWhere('tbl_tagihan.nomor_tagihan','like',"%".$cari."%")
		->orWhere('tbl_tagihan.uraian','like',"%".$cari."%")
		->paginate();

        return view('faktur/index',['title' => 'Data Faktur','faktur' => $faktur]);
        
	}
    public function cariStatus(Request $request)
	{
	
        $cari = $request->cari;
 
		$faktur = DB::table('tbl_faktur')
        ->select('tbl_faktur.*','tbl_faktur.id as id_faktur','tbl_faktur.status as status_faktur','tbl_pengguna.nama as nama_pic','tbl_tujuan.nama as nama_tujuan','tbl_tagihan.*')
        ->join('tbl_pengguna', 'tbl_pengguna.id', '=', 'tbl_faktur.id_pengguna')
        ->join('tbl_tagihan', 'tbl_tagihan.id', '=', 'tbl_faktur.id_tagihan')
        ->join('tbl_tujuan', 'tbl_tujuan.id', '=', 'tbl_tagihan.id_tujuan')
		->where('tbl_faktur.status','like',"%".$cari."%")
		->paginate();

        return view('faktur/index',['title' => 'Data Faktur','faktur' => $faktur]);
        
	}

    public function form(){

        $pengguna = Pengguna::select('*')
        ->get();

        $tagihan = Tagihan::select('*')
        ->where('status','Disetujui')
        ->get();


        return view('faktur/faktur_add',[
            'title' => 'Faktur',
            'pengguna' => $pengguna,
            'tagihan' => $tagihan
        ]);
    }

    public function add(Request $request){

        $validateData = $request->validate([
			'id_pengguna' => 'required',
			'id_tagihan' => 'required',
			'kode_faktur' => 'required|numeric',
			'tanggal' => 'required',
			'status' => 'required',
		]);

		Faktur::create($validateData);

		Tagihan::find($request->id_tagihan)->update(['status' => 'Closed']);

		return redirect('faktur/form')->with('Sukses', 'Data Faktur Tersimpan');
    }

    
    public function edit($id)
	{

        $pengguna = Pengguna::select('*')
        ->get();

        $tagihan = Tagihan::select('*')
        ->join('tbl_faktur', 'tbl_faktur.id_tagihan', '=', 'tbl_tagihan.id')
        ->where('tbl_faktur.id',$id)
        ->get();

		$faktur = Faktur::findOrFail($id);
        
		return view('faktur.faktur_edit',[
            'pengguna' => $pengguna,
            'tagihan' => $tagihan,
            'faktur' => $faktur
        ]);
	}

    public function update(Request $request, $id)
	{		
		$faktur = Faktur::find($id)->update($request->all()); 
				
		return redirect('faktur')->with('Edit', 'Data Faktur Diedit');
	}

    public function hapus($id)
	{

            $faktur = Faktur::where('id',$id)->delete();
			return redirect('faktur')->with('Hapus', 'Data Faktur Dihapus');

	}

     // cetak data per id
     public function cetak($id)
     {
 
         // $tagihan = Tagihan::all();
         $faktur = Faktur::select('tbl_faktur.*','tbl_faktur.tanggal as tanggal_faktur',
         'tbl_tagihan.*','tbl_tagihan.tanggal as tanggal_tagihan','tbl_pengguna.nama as nama_pic','tbl_tujuan.nama as nama_tujuan')
         ->join('tbl_pengguna', 'tbl_pengguna.id', '=', 'tbl_faktur.id_pengguna')
         ->join('tbl_tagihan', 'tbl_tagihan.id', '=', 'tbl_faktur.id_tagihan')
         ->join('tbl_tujuan', 'tbl_tujuan.id', '=', 'tbl_tagihan.id_tujuan')
         ->where('tbl_faktur.id',$id)
         ->get();
 
         // print_r($tagihan);exit;
  
         $pdf = Pdf::loadview('faktur/faktur_pdf',['faktur'=>$faktur]);
         return $pdf->stream();
         // return $pdf->download('laporan-tagihan-pdf');
 
     }

}
