@extends('layouts.master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', 'Laporan Rekap Dokumen')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-paperclip"></i> @yield('page_title')
    </h1>
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-4">
                @include('vendor.voyager.laporan.rekap_pencarian')
            </div>
            <div class="col-md-8">
                @include('vendor.voyager.laporan.rekap_hasil_pencarian')
            </div>
            </form>
        </div>
    </div>
@stop