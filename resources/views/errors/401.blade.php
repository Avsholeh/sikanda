@extends('errors::minimal')

@section('title', __('Unauthorized'))
@section('code', '401')

@section('message')
<p>Anda tidak diizinkan mengakses halaman ini.</p>
<p>Kembali ke <a href="{{ route('voyager.dashboard') }}">Halaman Utama</a></p>
@endsection
