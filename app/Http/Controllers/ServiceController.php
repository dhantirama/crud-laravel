<?php

namespace App\Http\Controllers;

//php artisan make:model service untuk membuat model
use App\Models\Service;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //select * from users
        $services = Service::get();
        $title = "Data Paket Laundry";
        return view('paket.index', compact('services', 'title')); //compact untuk melempar data
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Paket Laundry';
        return view('paket.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Service::create($request->all()); //cara pertama
        // Service::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);
        Alert::success('Selamat!', 'Data Berhasil Ditambah');
        return redirect()->to('service');
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
        $title = "Edit Paket";
        //select * from user where id= $id
        // $user = User::findorFail($id);  jika gagal menemukan data akan muncul not found
        // $user = User::where($id)->first; memunculkan data dari yg awal
        $service = Service::find($id);

        return view('paket.edit', compact('title', 'service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $service = Service::find($id);
        $service->service_name = $request->service_name;
        $service->price = $request->price;
        $service->description = $request->description;
        $service->save();

        Alert::success('Selamat!', 'Data Berhasil Diubah');
        return redirect()->to('service');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $service = Service::find($id)->delete();
        // meminta ke halaman sebelumnya
        return redirect()->to('service');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //destroy a/ function bawaan dari resource
        $service = Service::find($id)->delete();
        // meminta ke halaman sebelumnya
        Alert::success('Peringatan!', 'Data Berhasil Dihapus');
        return redirect()->to('service');
    }
}
