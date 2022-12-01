<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenggunaController extends Controller
{
    public function index(){
        $pengguna = Pengguna::orderBy('id', 'desc')->paginate(10); 
        return view('users/index',['title' => 'Data Users','pengguna' => $pengguna]);
    }

    public function cari(Request $request)
	{
	
		$cari = $request->cari;
 
		$pengguna = DB::table('tbl_pengguna')
		->where('nama','like',"%".$cari."%")
		->paginate();

        return view('users/index',['title' => 'Data Pengguna','pengguna' => $pengguna]);
        
	}
 

    public function form(){
        return view('users/users_add',[
            'title' => 'Users'
        ]);
    }

    public function add(Request $request){

        $validateData = $request->validate([
			'name' => 'required',
			'email' => 'required|email|unique:users|max:255',
			'password' => 'required|min:6',
		]);

		Pengguna::create([
            'nama' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

		return redirect('pengguna/form')->with('Sukses', 'Data Pengguna Tersimpan');
    }

    public function edit($id)
	{
		$pengguna = Pengguna::findOrFail($id);
		return view('users.users_edit',['pengguna' => $pengguna]);
	}

    public function update(Request $request, $id)
	{		
		$pengguna = Pengguna::find($id)->update($request->all()); 
				
		return redirect('pengguna')->with('Edit', 'Data Pengguna Diedit');
		// return view('karyawan',['karyawann' => $karyawan]);
	}

    public function hapus($id)
	{

			// DB::table('Karyawan')->where('id',$id)->delete();
            $pengguna = Pengguna::where('id',$id)->delete();
			return redirect('pengguna')->with('Hapus', 'Data Pengguna Dihapus');

	}
}
