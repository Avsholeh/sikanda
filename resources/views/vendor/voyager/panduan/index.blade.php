@extends('layouts.master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', 'Panduan')

@section('page_header')
    <h1 class="page-title">
        <i class="icon voyager-book"></i> @yield('page_title')
    </h1>
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    @if(in_array(auth()->user()->custom_role->id, [\App\Models\User::$ROLE_DEV, \App\Models\User::$ROLE_SUPERADMIN]))
                        <li role="presentation"
                            @if(in_array($userRole, [\App\Models\User::$ROLE_DEV, \App\Models\User::$ROLE_SUPERADMIN] )) class="active" @endif>
                            <a href="{{ route('panduan.index', \App\Models\User::$ROLE_SUPERADMIN) }}">Superadmin</a>
                        </li>
                        <li role="presentation" @if($userRole == \App\Models\User::$ROLE_ADMIN) class="active" @endif>
                            <a href="{{ route('panduan.index', \App\Models\User::$ROLE_ADMIN) }}">Admin</a>
                        </li>
                        <li role="presentation" @if($userRole == \App\Models\User::$ROLE_USER) class="active" @endif>
                            <a href="{{ route('panduan.index', \App\Models\User::$ROLE_USER) }}">User</a>
                        </li>
                    @endif

                    @if(in_array(auth()->user()->custom_role->id, [\App\Models\User::$ROLE_ADMIN]))
                        <li role="presentation" class="">
                            <a href="#">Admin</a>
                        </li>
                        <li role="presentation" class="">
                            <a href="#">User</a>
                        </li>
                    @endif

                    @if(in_array(auth()->user()->custom_role->id, [\App\Models\User::$ROLE_USER]))
                        <li role="presentation" class="">
                            <a href="#">User</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div id="pdf" style="height: 80vh"></div>
            </div>
        </div>
    </div>
@stop

@push('javascript')
    <script src='{{ asset('pdfobject/pdfobject.min.js') }}'></script>
    <script>
        var options = {
            pdfOpenParams: {toolbar: '0', navpanes: '0'}
        };
        PDFObject.embed('{{ $pdfUrl }}', "#pdf", options);
    </script>
@endpush