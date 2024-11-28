@extends('layout.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h3>{{ $title ?? '' }}</h3>
        <div class="card-body">
            <div align="right" class="mb-3">
                <a href="{{ route('service.create') }}" class="btn btn-primary">Tambah</a>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Paket</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $key => $val)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $val->service_name }}</td>
                        <td>{{"Rp" . " " . number_format($val->price) }}</td>
                        <td>{{ $val->description }}</td>
                        <td>
                            <a href="{{ route('service.edit', $val->id) }}" class="btn btn-icon btn-secondary">
                                <i class="tf-icons bx bx-pencil bx-22px"></i>
                            </a>
                            <form method="post" action="{{ route('service.destroy', $val->id) }}" class="d-inline">
                                @csrf <!-- tambahin ini kalo gamau ada page expired -->
                                @method('delete')
                                <button class="btn btn-icon btn-danger"><i class="tf-icons bx bx-trash bx-22px"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
