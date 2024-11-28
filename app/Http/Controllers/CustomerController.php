<?php

namespace App\Http\Controllers;

//php artisan make:model service untuk membuat model
use App\Models\Customer;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //select * from users
        $customers = Customer::get();
        $title = "Data Pelanggan";
        return view('pelanggan.index', compact('customers', 'title')); //compact untuk melempar data
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Pelanggan';
        return view('pelanggan.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Customer::create($request->all()); //cara pertama
        // Service::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);
        Alert::success('Selamat!', 'Data Berhasil Ditambah');
        return redirect()->to('customer');
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
        $title = "Edit Pelanggan";
        //select * from user where id= $id
        // $user = User::findorFail($id);  jika gagal menemukan data akan muncul not found
        // $user = User::where($id)->first; memunculkan data dari yg awal
        $customer = Customer::find($id);

        return view('pelanggan.edit', compact('title', 'customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $customer = Customer::find($id);
        $customer->customer_name = $request->customer_name;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->save();

        Alert::success('Selamat!', 'Data Berhasil Diubah');
        return redirect()->to('customer');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $customer = Customer::find($id)->delete();
        // meminta ke halaman sebelumnya
        return redirect()->to('customer');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //destroy a/ function bawaan dari resource
        $customer = Customer::find($id)->delete();
        // meminta ke halaman sebelumnya
        Alert::success('Peringatan!', 'Data Berhasil Dihapus');
        return redirect()->to('customer');
    }
}
