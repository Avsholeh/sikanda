@extends('layouts.master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', 'Laporan')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-paperclip"></i> Laporan
    </h1>
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <form action="{{ route('laporan.pencarian') }}" method="POST" enctype="multipart/form-data"
                  autocomplete="off">
                <div class="col-md-4">
                    @csrf
                    @include('vendor.voyager.laporan.form_pencarian')
                </div>
                <div class="col-md-8">
                    @include('vendor.voyager.laporan.form_hasil')
                </div>
            </form>
        </div>
    </div>
@stop

@push('javascript')
    <script>
        $(document).ready(function () {
            $("select[name=kategori]").change(function () {
                let kategori = $(this).find(":selected").text();
                $("#kolom_pencarian > label").text(kategori);
                $("input[name=kolom_pencarian]")
                    .attr("placeholder", kategori)
                    .val("");
            });

            $("#bersihkan").click(function() {
                $("input[name=kolom_pencarian]").val("");
            });
        });
    </script>
@endpush