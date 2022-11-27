<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use DataTables;

class UsersController extends Controller
{
    public function index(){
        return view('users/index',[
            'title' => 'Data Users'
        ]);
    }
    public function getUsers(Request $request)
    {
        if ($request->ajax()) {
            $data = User::latest()->get();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
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

		User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

		return redirect('users')->with('Sukses', 'Data Users Berhasil Tersimpan');
    }
}
