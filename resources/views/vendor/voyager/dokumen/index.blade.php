@extends('layouts.master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', 'Upload Dokumen')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-upload"></i>
        Dokumen Saya
    </h1>
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row" >
            <div class="col-md-6"style="margin-bottom: 0 !important;">
                <div class="panel panel-default border-primary">
                    <div class="panel-body">
                        <h4>Dinas Pendidikan</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li role="presentation" @if(!$status) class="active" @endif>
                        <a href="{{ route('dokumen.index') }}">Semua</a>
                    </li>
                    <li role="presentation" @if($status === 'belum-tuntas') class="active" @endif>
                        <a href="{{ route('dokumen.index', 'belum-tuntas') }}">Belum tuntas</a>
                    </li>
                    <li role="presentation" @if($status === 'sudah-tuntas') class="active" @endif>
                        <a href="{{ route('dokumen.index', 'sudah-tuntas') }}">Sudah tuntas</a>
                    </li>
                </ul>

                <div class="panel panel-default">
                    <div class="panel-body">

                        <div class="panel panel-borderer">
                            <div class="panel-body">
                                test
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop