@extends('layout.app')

{{-- Customize layout section --}}
@section('subtitle', 'Kategori')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Kategori')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-around">
                <h4>
                    Manage Kategori
                </h4>
                <a href="{{ route('kategori.create') }}" class="card-link btn btn-primary ml-auto">Add</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    {{ $dataTable->scripts() }}
@endpush