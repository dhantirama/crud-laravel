@extends('layout.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h3>{{ $title ?? '' }}</h3>
        <div class="card-body">
            <form action="{{ route('customer.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="">Nama Pelanggan</label>
                    <input name="customer_name" type="text" class="form-control" placeholder="Nama" >
                </div>
                <div class="mb-3">
                    <label for="">Telepon</label>
                    <input name="phone" type="number" class="form-control" placeholder="Telepon" >
                </div>
                <div class="mb-3">
                    <label for="">Alamat</label>
                    <input name="address" type="text" class="form-control" placeholder="Alamat" >
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
