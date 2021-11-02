@extends('layouts.master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', 'Laporan Data Dokumen')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-paperclip"></i> @yield('page_title')
    </h1>
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-4">
                @include('vendor.voyager.laporan.data_pencarian')
            </div>
            <div class="col-md-8">
                @if(request()->route('dokumen'))
                    @include('vendor.voyager.laporan.data_detail')
                @else
                    @include('vendor.voyager.laporan.data_hasil_pencarian')
                @endif
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

            $("#bersihkan").click(function () {
                $("input[name=kolom_pencarian]").val("");
            });
        });
    </script>
@endpush