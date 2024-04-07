@extends('layout.app')

{{-- Customize layout section --}}

@section('subtitle', 'welcome')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Welcome')

{{-- Content body: main pae content --}}

@section('content_body')
    <p>Welcome to this beautiful admin panel.</p>
@stop

{{-- push extra css --}}

@push('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endpush

{{-- Push exttra scripts --}}

@push('js')
    <script>
        console.log('Hi, i`m using the Laravel.AdminLTE package!');
    </script>
@endpush