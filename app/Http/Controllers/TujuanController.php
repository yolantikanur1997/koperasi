<?php

namespace App\Http\Controllers;

use App\Models\Tujuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TujuanController extends Controller
{
    public function index(){
        $tujuan = Tujuan::orderBy('created_at', 'desc')->paginate(10); 
        return view('tujuan/index',['title' => 'Data Users','tujuan' => $tujuan]);
    }

	public function cari(Request $request)
	{
	
		$cari = $request->cari;
 
		$tujuan = DB::table('tbl_tujuan')
		->where('nama','like',"%".$cari."%")
		->orWhere('penanggung_jawab','like',"%".$cari."%")
		->orWhere('email','like',"%".$cari."%")
		->orWhere('telepon','like',"%".$cari."%")
		->paginate();

        return view('tujuan/index',['title' => 'Data Tujuan','tujuan' => $tujuan]);
        
	}

    public function form(){
        return view('tujuan/tujuan_add',[
            'title' => 'Users'
        ]);
    }

    public function add(Request $request){

        $validateData = $request->validate([
			'nama' => 'required',
			'alamat' => 'required',
			'email' => 'required|email|unique:users|max:255',
			'telepon' => 'required|numeric',
			'penanggung_jawab' => 'required',
		]);

		Tujuan::create($validateData);

		return redirect('tujuan/form')->with('Sukses', 'Data Tujuan Tersimpan');
    }

    public function edit($id)
	{
		$tujuan = Tujuan::findOrFail($id);
		return view('tujuan.tujuan_edit',['tujuan' => $tujuan]);
	}

    public function update(Request $request, $id)
	{		
		$pengguna = Tujuan::find($id)->update($request->all()); 
				
		return redirect('tujuan')->with('Edit', 'Data Tujuan Diedit');
	}

    public function hapus($id)
	{

            $pengguna = Tujuan::where('id',$id)->delete();
			return redirect('tujuan')->with('Hapus', 'Data Tujuan Dihapus');

	}
}
