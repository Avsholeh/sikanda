@extends('layouts.master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', 'Upload Dokumen')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-upload"></i>
        Upload Dokumen
    </h1>
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <form action="{{ route('upload-dokumen.store') }}" method="POST" enctype="multipart/form-data"
                  autocomplete="off">
                <div class="col-md-6">
                    @csrf
                    <div class="panel panel-bordered">
                        <div class="panel-heading">
                            <p style="margin-left: 20px; margin-top: 10px; font-weight: bold">Form Dokumen Utama</p>
                        </div>
                        <div class="panel-body">

                            <!-- SPP -->
                            <div class="panel panel-default border-primary">
                                <div class="panel-body">
                                    @if(in_array(auth()->user()->custom_role->id,
                                        [App\Models\User::$ROLE_DEV,
                                        App\Models\User::$ROLE_SUPERADMIN]))
                                        <div class="form-group">
                                            <label class="">Dinas</label>
                                            <select name="dinas" class="form-control">
                                                <option value="" selected disabled>Pilih Dinas</option>
                                                @foreach($dinas as $dns)
                                                    <option value="{{ $dns->id }}" @if(old('dinas') == $dns->id){{ 'selected' }}@endif>
                                                        {{ $dns->nm_dinas }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('dinas')
                                            <span class="text-danger">* {{ $message }}</span>
                                            @enderror
                                        </div>
                                    @endif

                                    <div class="form-group">
                                        <label class="">Tahun</label>
                                        <select name="tahun" class="form-control">
                                            <option value="" selected disabled>Pilih Tahun</option>
                                            @foreach($tahun as $thn)
                                                <option value="{{ $thn }}" @if(old('dinas') == $thn){{ 'selected' }}@endif>
                                                    {{ $thn }}
                                                </option>
                                            @endforeach
                                        </select>
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

                                    <div class="form-group">
                                        <label>File SPP <small class="text-danger">*</small></label>
                                        <input type="file" name="file_spp" accept="application/pdf">
                                        @error('file_spp')
                                        <span class="text-danger">* {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- SPM -->
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>No SPM</label>
                                        <input class="form-control" name="no_spm" type="text"
                                               placeholder="No SPM" disabled>
                                        <div class="text-muted" style="margin-top: .5em">
                                            * Silahkan upload SPP terlebih dahulu
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- SP2D -->
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>No SP2D</label>
                                        <input class="form-control" name="no_sp2d" type="text"
                                               placeholder="No SP2D" disabled>
                                        <div class="text-muted" style="margin-top: .5em">
                                            * Silahkan upload SPP terlebih dahulu
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-bordered">
                        <div class="panel-heading">
                            <p style="margin-left: 20px; margin-top: 10px; font-weight: bold">Form Dokumen Pendukung</p>
                        </div>
                        <div class="panel-body">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>Nama Dokumen</label>
                                        <input class="form-control" name="nama_dokumen" type="text"
                                               placeholder="Nama Dokumen" disabled>
                                        <div class="text-muted" style="margin-top: .5em">
                                            * Silahkan upload SPP terlebih dahulu
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@stop

