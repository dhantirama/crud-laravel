@extends('kalkulator.index') <!-- direksi untuk memperpanjang content -->
@section('content') <!-- 'content' harus sesuai dengan@ yield di index.blade.php -->
    <form action="{{ route('store-bagi') }}" method="post" style="margin-top: 20px;">
        @csrf <!-- security form dari laravel -->
        <label for="">Angka 1</label>
        <input type="text" name="angka1" placeholder="Masukkan angka 1" id="">
        <br>
        :
        <br>
        <label for="">Angka 2</label>
        <input type="text" name="angka2" id="" placeholder="Masukkan angka 2">
        <br>
        <button>Proses</button>
    </form>
    <h3>Hasilnya adalah: {{ $jumlah }}</h3>
@endsection
