@extends('layout.app')

@section('subtitle', 'Kategori')
@section('content_header_title', 'Kategori')
@section('content_header_subtitle', 'Create')

@section('content')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Buat Kategori Baru</h3>
            </div>
            <form method="post" action="{{ route('kategori.store') }}">
                <div class="card-body">
                    {{ @csrf_field() }}
                    <div class="form-group">
                        <label for="kategori_kode">Kode Kategori</label>
                        <input id="kategori_kode" type="text"
                            class="@error('kategori_kode') is-invalid @enderror form-control" name="kategori_kode"
                            placeholder="Masukkan Kode Kategori">

                        @error('kategori_kode')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="kategori_nama">Nama Kategori</label>
                        <input type="text" class="@error('kategori_nama') is-invalid @enderror form-control" name="kategori_nama"
                            placeholder="Masukkan Nama Kategori">

                        @error('kategori_nama')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
@endsection