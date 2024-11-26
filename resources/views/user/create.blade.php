@extends('layout.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h3>{{ $title ?? '' }}</h3>
        <div class="card-body">
            <form action="{{ route('user.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="">Nama</label>
                    <input name="name" type="text" class="form-control" placeholder="Nama" >
                </div>
                <div class="mb-3">
                    <label for="">Email</label>
                    <input name="email" type="email" class="form-control" placeholder="Nama" >
                </div>
                <div class="mb-3">
                    <label for="">Password</label>
                    <input name="password" type="password" class="form-control" placeholder="Nama" >
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
