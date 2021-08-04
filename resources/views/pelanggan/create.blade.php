@extends('layouts.app', ['title' => 'Pelanggan'])

@section('content')
    <h1>Tambah Data Pelanggan</h1>

    <div class="card">
        <div class="card-header">Tambah Pelanggan</div>

        <div class="card-body">
            <form action="/create" method="post">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama Pelanggan</label>
                    <input type="text" name="nama" id="nama" class="form-control">
                    @if($errors->has('nama'))
                        <div class="text-danger">{{ $errors->first('nama') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="pesanan">Pesanan</label>
                    <input type="text" name="pesanan" id="pesanan" class="form-control">
                    @if($errors->has('divisi'))
                        <div class="text-danger">{{ $errors->first('pesanan') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="text" name="jumlah" id="jumlah" class="form-control">
                    @if($errors->has('jumlah'))
                        <div class="text-danger">{{ $errors->first('jumlah') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" rows="3" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Tambah</button>
            </form>
        </div>
    </div>
@stop
