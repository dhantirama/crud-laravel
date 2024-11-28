@extends('layout.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h3>{{ $title ?? '' }}</h3>
        <div class="card-body">
            <form action="{{ route('trans_order.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="">No Transaksi</label>
                            <input name="order_code" value="{{ $order_code ?? '' }}" type="text" class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="">Tanggal Laundri</label>
                            <input name="order_date" type="date" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="">Nama Pelanggan</label>
                            <select name="id_customer" class="form-control" id="">
                                <option value="">-- Pilih Pelanggan -- </option>
                                @foreach ($customers as $cus)
                                <option value="{{ $cus->id }}">{{ $cus->customer_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">Tanggal Selesai</label>
                            <input name="order_end_date" type="date" class="form-control">
                        </div>
                    </div>
                </div>
                <div align=right class="mb-3 mt-3">
                    <button class="btn btn-secondary add-row" type="button">Tambah</button> <!-- add row adalah parents dari table -->
                </div>
                <div class="table-responsive mb-3 mt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama Paket</th>
                                <th>Qty</th>
                                <th>Harga</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody class="tbody-parent">
                            <tr>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br>
                <div class="mb-3">
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
