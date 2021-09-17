@extends('voyager::master')

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
            <div class="col-md-6">
                <div class="panel panel-bordered">
                    <div class="panel-heading">
                        <p style="margin-left: 20px; margin-top: 10px; font-weight: bold">SPP</p>
                    </div>
                    <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A adipisci alias assumenda
                            distinctio,
                            in ipsum optio quis sapiente! Debitis ducimus exercitationem illum libero maxime molestiae
                            molestias nesciunt numquam repellat rerum!</p>
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </div>
                <div class="panel panel-bordered">
                    <div class="panel-heading">
                        <p style="margin-left: 20px; margin-top: 10px; font-weight: bold">SPM</p>
                    </div>
                    <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A adipisci alias assumenda
                            distinctio,
                            in ipsum optio quis sapiente! Debitis ducimus exercitationem illum libero maxime molestiae
                            molestias nesciunt numquam repellat rerum!</p>
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </div>
                <div class="panel panel-bordered">
                    <div class="panel-heading">
                        <p style="margin-left: 20px; margin-top: 10px; font-weight: bold">SP2D</p>
                    </div>
                    <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A adipisci alias assumenda
                            distinctio,in ipsum optio quis sapiente! Debitis ducimus exercitationem illum libero maxime
                            molestiae molestias nesciunt numquam repellat rerum!</p>
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-bordered">
                    <div class="panel-heading">
                        <p style="margin-left: 20px; margin-top: 10px; font-weight: bold">Dokumen Pendukung</p>
                    </div>
                    <div class="panel-body">
                        <form action="#">
                            <div class="form-group">
                                <label class="control-label">File</label>
                                <input class="form-control" type="file" value="">
                            </div>
                        </form>
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
