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
            <form action="{{ route('upload-dokumen.store') }}" method="POST" enctype="multipart/form-data">
                <div class="col-md-6">
                    @csrf
                    <div class="panel panel-bordered">
                        <div class="panel-heading">
                            <p style="margin-left: 20px; margin-top: 10px; font-weight: bold">Dokumen Utama</p>
                        </div>
                        <div class="panel-body">
                            <div class="panel panel-default border-primary">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="">No SPP</label>
                                        <input class="form-control" name="no_spp" type="text"
                                               value="{{ old('no_spp') }}" placeholder="No SPP">
                                        @error('no_spp')
                                        <span class="text-danger">* {{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>File SPP</label>
                                        <input type="file" name="file_spp">
                                        @error('file_spp')
                                        <span class="text-danger">* {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>No SPM</label>
                                        <input class="form-control" name="no_spm" type="text"
                                               value="{{ old('no_spp') }}" placeholder="No SPM">
                                        @error('no_spm')
                                        <span class="text-danger">* {{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div id="spm-group" class="form-group">
                                        <label>File SPM</label>
                                        <input type="file" name="file_spm" placeholder="No SPM">
                                        @error('file_spm')
                                        <span class="text-danger">* {{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input type="checkbox" name="spm_check">
                                        <label><strong>Upload nanti.</strong></label>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>No SP2D</label>
                                        <input class="form-control" name="no_sp2d" type="text"
                                               value="{{ old('no_spp') }}" placeholder="No SP2D">
                                        @error('no_sp2d')
                                        <span class="text-danger">* {{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div id="sp2d-group" class="form-group">
                                        <label>File SP2D</label>
                                        <input type="file" name="file_sp2d">
                                        @error('file_sp2d')
                                        <span class="text-danger">* {{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input type="checkbox" name="sp2d_check">
                                        <label><strong>Upload nanti.</strong></label>
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
                            <p style="margin-left: 20px; margin-top: 10px; font-weight: bold">Dokumen Pendukung</p>
                        </div>
                        <div class="panel-body">
                            <livewire:dokumen-pendukung/>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@stop

@push('javascript')
    <script>
        document.querySelector("input[name=spm_check]")
            .addEventListener('change', function() {
            if (this.checked) {
                document.querySelector("#spm-group").style.display = 'none';
                document.querySelector("input[name=no_spm]").disabled = true;
            } else {
                document.querySelector("#spm-group").style.display = 'block';
                document.querySelector("input[name=no_spm]").disabled = false;
            }
        });

        document.querySelector("input[name=sp2d_check]")
            .addEventListener('change', function() {
                if (this.checked) {
                    document.querySelector("#sp2d-group").style.display = 'none';
                    document.querySelector("input[name=no_sp2d]").disabled = true;
                } else {
                    document.querySelector("#sp2d-group").style.display = 'block';
                    document.querySelector("input[name=no_sp2d]").disabled = false;
                }
            });
    </script>
@endpush
