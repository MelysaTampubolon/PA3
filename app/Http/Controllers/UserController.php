<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataAkun = User::all();
        return view('akun.akun', compact('dataAkun'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('akun.addAkun');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'username'=> 'required',
            'password'=> 'required',
            'roles'=> 'required',
            'nama'=> 'required',
        ]);

//        $dataAkun = new User;
//        $dataAkun->username = $request->username;
//        $dataAkun->password = $request->password;
//        $dataAkun->roles = $request->roles;
//        $dataAkun->nama = $request->nama;

//        $dataAkun = new User([
//            'username' => $request->get('username'),
//            'password' => $request->get('password'),
//            'roles' => $request->get('roles'),
//            'nama' => $request->get('nama'),
//        ]);

        $query = DB::table('user')->insert([
            'username'=>$request->input('username'),
            'password'=>$request->input('password'),
            'roles'=>$request->input('roles'),
            'nama'=>$request->input('nama'),
        ]);

//        $dataAkun->save();
        if ($query){
            return redirect('/showAkun')->with('success', 'Data Disimpan');
        }
        else{
            return redirect('/addAkun')->with('error', 'Data yang ada masukkan salah.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = DB::table('user')->where('id', $id)->first();
        $dataAkun = [
            'dataAkun'=>$row
        ];

        return view('akun.editAkun', $dataAkun);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'username'=> 'required',
            'password'=> 'required',
            'roles'=> 'required',
            'nama'=> 'required',
        ]);

        $query = DB::table('user')->where('id', $request->input('dataID'))
            ->update([
                'username'=>$request->input('username'),
                'password'=>$request->input('password'),
                'roles'=>$request->input('roles'),
                'nama'=>$request->input('nama'),
            ]);
        return redirect('/showAkun')->with('success', 'Data Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = DB::table('user')->where('id', $id)->delete();
        return redirect('/showAkun')->with('success', 'Data Dihapus');
    }
}
