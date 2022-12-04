<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BankController extends Controller
{
    public function index(){
        $bank = Bank::orderBy('created_at', 'desc')->paginate(10); 
        return view('bank/index',['title' => 'Data Bank','bank' => $bank]);
    }

    public function cari(Request $request)
	{
	
		$cari = $request->cari;
 
		$bank = DB::table('tbl_bank')
		->where('nama','like',"%".$cari."%")
		->orWhere('akun','like',"%".$cari."%")
		->orWhere('nomor_rekening','like',"%".$cari."%")
		->paginate();

        return view('bank/index',['title' => 'Data Bank','bank' => $bank]);
        
	}

    public function form(){
        return view('bank/bank_add',[
            'title' => 'Bank'
        ]);
    }
    public function add(Request $request){

        $validateData = $request->validate([
			'nama' => 'required',
			'akun' => 'required',
			'nomor_rekening' => 'required|numeric',
		]);

		Bank::create($validateData);

		return redirect('bank/form')->with('Sukses', 'Data Bank Tersimpan');
    }

    public function edit($id)
	{
		$bank = Bank::findOrFail($id);
		return view('bank.bank_edit',['bank' => $bank]);
	}

    public function update(Request $request, $id)
	{		
		$bank = Bank::find($id)->update($request->all()); 
				
		return redirect('bank')->with('Edit', 'Data Bank Diedit');
	}

    public function hapus($id)
	{

            $bank = Bank::where('id',$id)->delete();
			return redirect('bank')->with('Hapus', 'Data Bank Dihapus');

	}

}
