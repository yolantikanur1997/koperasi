<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use App\Models\Tagihan;
use App\Models\Tujuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class TagihanController extends Controller
{
    public function index(){
        $tagihan = Tagihan::select('tbl_tagihan.*','tbl_pengguna.nama as nama_pic','tbl_tujuan.nama as nama_tujuan')
        ->join('tbl_pengguna', 'tbl_pengguna.id', '=', 'tbl_tagihan.id_pengguna')
        ->join('tbl_tujuan', 'tbl_tujuan.id', '=', 'tbl_tagihan.id_tujuan')
        ->where('status', 'Proses')
        ->orWhere('status', 'Disetujui')
        ->orderBy('tbl_tagihan.created_at', 'desc')->paginate(10); 
        return view('tagihan/index',['title' => 'Data Tagihan','tagihan' => $tagihan]);
    }

    public function cari(Request $request)
	{
	
		$cari = $request->cari;
 
		$tagihan = DB::table('tbl_tagihan')
        ->select('tbl_tagihan.*','tbl_pengguna.nama as nama_pic','tbl_tujuan.nama as nama_tujuan')
        ->join('tbl_pengguna', 'tbl_pengguna.id', '=', 'tbl_tagihan.id_pengguna')
        ->join('tbl_tujuan', 'tbl_tujuan.id', '=', 'tbl_tagihan.id_tujuan')
		->where('tbl_pengguna.nama','like',"%".$cari."%")
		->orWhere('tbl_tujuan.nama','like',"%".$cari."%")
		->orWhere('tbl_tagihan.nomor_tagihan','like',"%".$cari."%")
		->orWhere('tbl_tagihan.nilai_tagihan','like',"%".$cari."%")
		->orWhere('tbl_tagihan.tanggal','like',"%".$cari."%")
		->paginate();

        return view('tagihan/index',['title' => 'Data Tagihan','tagihan' => $tagihan]);
        
	}
    public function cariStatus(Request $request)
	{
	
		$cari = $request->cari;
 
		$tagihan = DB::table('tbl_tagihan')
        ->select('tbl_tagihan.*','tbl_pengguna.nama as nama_pic','tbl_tujuan.nama as nama_tujuan')
        ->join('tbl_pengguna', 'tbl_pengguna.id', '=', 'tbl_tagihan.id_pengguna')
        ->join('tbl_tujuan', 'tbl_tujuan.id', '=', 'tbl_tagihan.id_tujuan')
		->where('tbl_tagihan.status','like',"%".$cari."%")
		->paginate();

        return view('tagihan/index',['title' => 'Data Tagihan','tagihan' => $tagihan]);
        
	}

    public function form(){

        $pengguna = Pengguna::select('*')
        ->get();

        $tujuan = Tujuan::select('*')
        ->get();


        return view('tagihan/tagihan_add',[
            'title' => 'Tagihan',
            'pengguna' => $pengguna,
            'tujuan' => $tujuan
        ]);
    }

    public function add(Request $request){

        $validateData = $request->validate([
			'id_pengguna' => 'required',
			'id_tujuan' => 'required',
			'tanggal' => 'required',
			'uraian' => 'required',
			'nilai_tagihan' => 'required|numeric',
			'status' => 'required',
		]);

		$tagihan = Tagihan::create($validateData);

		return redirect('tagihan/form')->with('Sukses', 'Data Tagihan Tersimpan');
    }

    public function edit($id)
	{

        $pengguna = Pengguna::select('*')->get();
        $tujuan = Tujuan::select('*')->get();
		$tagihan = Tagihan::findOrFail($id);
		return view('tagihan.tagihan_edit',[
            'pengguna' => $pengguna,
            'tujuan' => $tujuan,
            'tagihan' => $tagihan]);
	}

    public function update(Request $request, $id)
	{		
		$tagihan = Tagihan::find($id)->update($request->all()); 
				
		return redirect('tagihan')->with('Edit', 'Data Tagihan Diedit');
	}

    public function hapus($id)
	{

            $tagihan = Tagihan::where('id',$id)->delete();
			return redirect('tagihan')->with('Hapus', 'Data Tagihan Dihapus');

	}

    // cetak data per id
    public function cetak($id)
	{

        // $tagihan = Tagihan::all();
        $tagihan = Tagihan::select('tbl_tagihan.*','tbl_pengguna.nama as nama_pic','tbl_tujuan.nama as nama_tujuan')
        ->join('tbl_pengguna', 'tbl_pengguna.id', '=', 'tbl_tagihan.id_pengguna')
        ->join('tbl_tujuan', 'tbl_tujuan.id', '=', 'tbl_tagihan.id_tujuan')
        ->where('tbl_tagihan.id',$id)
        ->get();

        // print_r($tagihan);exit;
 
    	$pdf = Pdf::loadview('tagihan/tagihan_pdf',['tagihan'=>$tagihan]);
        return $pdf->stream();
    	// return $pdf->download('laporan-tagihan-pdf');

	}

}
