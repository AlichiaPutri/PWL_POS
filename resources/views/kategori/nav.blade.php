@extends('layout.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Kategori')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Kategori')

@section('content')
<li class="nav-item">
    <a href="/kategori" class="nav-link">
        <i class="fa fa-list"></i> Manage Kategori
    </a>
</li>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}

@endpush