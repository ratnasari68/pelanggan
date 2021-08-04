@extends('layouts.app', ['title' => 'Pelanggan'])

@section('content')
    <h1>Data Pelanggan</h1>

    <div class="card">
        <div class="card-header">Edit Pelanggan</div>

        <div class="card-body">
            <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="post">
                <input type="hidden" name="id" value="{{ $pelanggan->id  }}">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="nama">Nama Pelanggan</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="{{ $pelanggan->nama }}">
                    @if($errors->has('nama'))
                        <div class="text-danger">{{ $errors->first('nama') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="pesanan">Pesanan</label>
                    <input type="text" name="pesanan" id="pesanan" class="form-control" value="{{ $pelanggan->pesanan }}">
                    @if($errors->has('pelanggan'))
                        <div class="text-danger">{{ $errors->first('pelanggan') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="text" name="jumlah" id="jumlah" class="form-control" value="{{ $pelanggan->jumlah }}">
                    @if($errors->has('pelanggan'))
                        <div class="text-danger">{{ $errors->first('pelanggan') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" rows="3" class="form-control">{{ $pelanggan->alamat }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Tambah</button>
            </form>
        </div>
    </div>
@stop
