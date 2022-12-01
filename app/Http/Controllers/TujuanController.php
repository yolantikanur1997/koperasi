<?php

namespace App\Http\Controllers;

use App\Models\Tujuan;
use Illuminate\Http\Request;

class TujuanController extends Controller
{
    public function index(){
        $tujuan = Tujuan::orderBy('id', 'desc')->paginate(10); 
        return view('tujuan/index',['title' => 'Data Users','tujuan' => $tujuan]);
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
			'telepon' => 'required',
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
