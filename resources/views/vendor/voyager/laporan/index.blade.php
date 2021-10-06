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
            <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
                <div class="col-md-4">
                    @csrf
                    <div class="panel panel-bordered">
                        <div class="panel-heading"><p style="margin-left: 20px; margin-top: 10px; font-weight: bold">
                                Form Pencarian</p></div>
                        <div class="panel-body">
                            <!-- SPP -->
                            <div class="panel panel-default border-primary">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="">Kategori Pencarian</label>
                                        <input class="form-control" name="tahun" type="number"
                                               value="{{ old('tahun') }}" placeholder="Tahun">
                                        @error('tahun')
                                        <span class="text-danger">* {{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="">No SPP <small class="text-danger">*</small></label>
                                        <input class="form-control" name="no_spp" type="text"
                                               value="{{ old('no_spp') }}" placeholder="No SPP">
                                        @error('no_spp')
                                        <span class="text-danger">* {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="panel panel-bordered">
                        <div class="panel-heading">
                            <p style="margin-left: 20px; margin-top: 10px; font-weight: bold">Hasil Pencarian</p>
                        </div>
                        <div class="panel-body">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis hic
                                    necessitatibus obcaecati perspiciatis quam saepe sit, sunt ut! Aliquam animi debitis
                                    deserunt fuga nihil quaerat quisquam quos vel vero voluptates.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop