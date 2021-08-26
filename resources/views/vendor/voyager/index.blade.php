@extends('voyager::master')

@section('content')
    <div class="page-content">
        @include('voyager::alerts')
        @include('voyager::dimmers')

        <div class="row" style="margin-left: 5px">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        Sedang dalam pengembangan.
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop

@section('javascript')
{{-- should start with <script> tag  --}}


@stop
