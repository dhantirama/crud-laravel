@extends('layout.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h3>{{ $title ?? '' }}</h3>
        <div class="card-body">
            <form action="{{ route('service.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="">Nama Paket</label>
                    <input name="service_name" type="text" class="form-control" placeholder="Nama" >
                </div>
                <div class="mb-3">
                    <label for="">Harga</label>
                    <input name="price" type="number" class="form-control" placeholder="Harga" >
                </div>
                <div class="mb-3">
                    <label for="">Deskripsi</label>
                    <input name="description" type="text" class="form-control" placeholder="Deskripsi" >
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
