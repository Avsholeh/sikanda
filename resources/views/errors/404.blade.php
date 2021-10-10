@extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')

@section('message')
    <p>Halaman tidak ditemukan.</p>
    <p>Kembali ke <a href="{{ route('voyager.dashboard') }}">Halaman Utama</a></p>
@endsection
