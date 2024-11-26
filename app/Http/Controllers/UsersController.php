<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //select * from users
        $users = User::get();
        $title = "Data User";
        return view('user.index', compact('users', 'title')); //compact untuk melempar data
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah User';
        return view('user.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // User::create($request->all()); //cara pertama
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        Alert::success('Selamat!', 'Data Berhasil Ditambah');
        return redirect()->to('user');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Edit User";
        //select * from user where id= $id
        // $user = User::findorFail($id);  jika gagal menemukan data akan muncul not found
        // $user = User::where($id)->first; memunculkan data dari yg awal
        $user = User::find($id);

        return view('user.edit', compact('title', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->password) {
            User::where('id', $id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        } else {
            User::where('id', $id)->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
        }
        Alert::success('Selamat!', 'Data Berhasil Diubah');
        return redirect()->to('user');

        // //cara 2
        // $user = User::find($id);
        // if ($request->password) {
        //     User::where('id', $id)->update([
        //         'name' => $request->name,
        //         'email' => $request->email,
        //         'password' => Hash::make($request->password),
        //     ]);
        // } else {
        //     User::where('id', $id)->update([
        //         'name' => $request->name,
        //         'email' => $request->email,
        //         'password' => $user->password
        //     ]);
        // }
        return redirect()->to('user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $user = User::find($id)->delete();
        // meminta ke halaman sebelumnya
        return redirect()->to('user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //destroy a/ function bawaan dari resource
        $user = User::find($id)->delete();
        // meminta ke halaman sebelumnya
        Alert::success('Peringatan!', 'Data Berhasil Dihapus');
        return redirect()->to('user');
    }
}
