@extends('layout.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h3>{{ $title ?? '' }}</h3>
        <div class="card-body">
            <form action="{{ route('customer.update', $customer->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="">Nama Paket</label>
                    <input value="{{ $customer->customer_name }}" name="customer_name" type="text" class="form-control" placeholder="Nama" >
                </div>
                <div class="mb-3">
                    <label for="">Telepon</label>
                    <input value="{{ $customer->phone }}" name="phone" type="text" class="form-control" placeholder="Nama" >
                </div>
                <div class="mb-3">
                    <label for="">Alamat</label>
                    <input  value="{{ $customer->address }}" name="address" type="text" class="form-control" placeholder="Nama" >
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
