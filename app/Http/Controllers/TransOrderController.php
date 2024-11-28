<?php

namespace App\Http\Controllers;

//php artisan make:model service untuk membuat model
use App\Models\Order;
use App\Models\Service;
use App\Models\Customer;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class TransOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //select * from users
        $orders = Order::with('customer')->get();
        $title = "Data Order";
        return view('order.index', compact('orders', 'title')); //compact untuk melempar data
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Order';
        $order = Order::get()->last();
        //untuk membuat id_order
        $id_order = $order->id ?? '';
        $id_order++;
        $order_code = "L" . date('dmY') . sprintf("%03s", $id_order); //%03s berarti bilangannya 000

        $customers = Customer::get();
        $services = Service::get();
        return view('order.create', compact('title', 'order_code', 'customers', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Order::create($request->all()); //cara pertama
        // Service::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);
        Alert::success('Selamat!', 'Data Berhasil Ditambah');
        return redirect()->to('order');
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
        $title = "Edit Order";
        //select * from user where id= $id
        // $user = User::findorFail($id);  jika gagal menemukan data akan muncul not found
        // $user = User::where($id)->first; memunculkan data dari yg awal
        $order = Order::find($id);

        return view('order.edit', compact('title', 'order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $order = Order::find($id);
        // $order->order_date = $request->order_date;
        // $order->order_end_date = $request->order_end_date;
        // $order->order_status = $request->order_status;
        // $order->save();

        Alert::success('Selamat!', 'Data Berhasil Diubah');
        return redirect()->to('order');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $order = Order::find($id)->delete();
        // meminta ke halaman sebelumnya
        return redirect()->to('order');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //destroy a/ function bawaan dari resource
        $order = Order::find($id)->delete();
        // meminta ke halaman sebelumnya
        Alert::success('Peringatan!', 'Data Berhasil Dihapus');
        return redirect()->to('order');
    }
}
