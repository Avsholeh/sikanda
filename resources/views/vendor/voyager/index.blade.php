@extends('layouts.master')

@section('pre_css')
    <style>
        .card-grad-primary {
            background: linear-gradient(90deg, #8572d7 0%, #A8C0FF 100%);
            color: white;
            border-radius: 10px !important;
            height: 140px;
        }

        .card-grad-secondary {
            background: linear-gradient(90deg, #FDBB2D 0%, #9cd94f 100%);
            color: white;
            border-radius: 10px !important;
            height: 140px;
        }

        .card-grad-danger {
            background: linear-gradient(90deg, #d53369 0%, #daae51 100%);
            color: white;
            border-radius: 10px !important;
            height: 140px;
        }

        .page-content > .row > [class*=col-] {
            /*padding: 0 4px 0 4px;*/
            margin: 0;
        }
    </style>
@endsection

@section('content')
    <div class="page-content">
        @include('voyager::alerts')
        @include('voyager::dimmers')

        <div class="row">
            <div class="col-md-4" style="">
                <div class="panel panel-default card-grad-primary">
                    <div class="panel-body">
                        <h4>Dinas</h4>
                        @if (auth()->user()->custom_role->id === \App\Models\User::$ROLE_SUPERADMIN)
                            <p style="font-size: 1.2rem; font-weight: bold">
                                SuperAdmin
                            </p>
                        @else
                            <p style="font-size: 1.2rem; font-weight: bold">
                                {{ \App\Models\Dinas::where('id', auth()->user()->dinas->id)->first()->nm_dinas ?? '' }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="panel panel-default card-grad-secondary">
                    <div class="panel-body">
                        <h4>Total Dokumen</h4>
                        @if (auth()->user()->custom_role->id === \App\Models\User::$ROLE_SUPERADMIN)
                            <p style="font-size: 1.5rem; font-weight: bold">
                                {{ \App\Models\Dokumen::count() }}
                            </p>
                        @else
                            <p style="font-size: 1.5rem; font-weight: bold">
                                {{ \App\Models\Dokumen::where('dinas_id', auth()->user()->dinas->id)->count() }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-4 ">
                <div class="panel panel-default card-grad-danger">
                    <div class="panel-body">
                        <h4>Dokumen Tuntas</h4>
                        @if (auth()->user()->custom_role->id === \App\Models\User::$ROLE_SUPERADMIN)
                            <p style="font-size: 1.5rem; font-weight: bold">
                                {{ \App\Models\Dokumen::where('status', 'S')->count() }}
                            </p>
                        @else
                            <p style="font-size: 1.5rem; font-weight: bold">
                                @php
                                    echo \App\Models\Dokumen::where([
                                        'dinas_id'=> auth()->user()->dinas->id,
                                        'status' => 'S'
                                    ])->count()
                                @endphp
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="panel">
                    <div class="panel-heading" style="padding-bottom: 15px">
                        <p style="padding-left: 20px; padding-top: 10px; margin-bottom:0; font-weight: bold">Akses Cepat</p>
                        <small style="padding-left: 20px; padding-top: 4px;">
                            Anda dapat mengunggah dokumen secara langsung.
                        </small>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('upload-dokumen.store') }}" method="POST" enctype="multipart/form-data"
                              autocomplete="off">
                        @csrf
                        <!-- SPP -->
                            <div class="panel panel-default border-primary">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="">Tahun <small class="text-danger">*</small></label>
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

                                    <div class="form-group">
                                        <label>File SPP <small class="text-danger">*</small></label>
                                        <input type="file" name="file_spp" accept="application/pdf">
                                        @error('file_spp')
                                        <span class="text-danger">* {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="panel">
                    <div class="panel-heading" style="padding-bottom: 15px">
                        <p style="padding-left: 20px; padding-top: 10px; margin-bottom:0; font-weight: bold">
                            Dokumen Belum Tuntas
                        </p>
                        <small style="padding-left: 20px; padding-top: 4px;">Menampilkan 5 dokumen terbaru yang belum tuntas.</small>
                    </div>
                    <div class="panel-body">
                        @php
                            if (auth()->user()->custom_role->id === \App\Models\User::$ROLE_SUPERADMIN) {
                                $dokumens = \App\Models\Dokumen::where([
                                    'status' => 'B'
                                ])->orderByDesc('created_at')->take(5)->get();
                            } else {
                                $dokumens = \App\Models\Dokumen::where([
                                    'dinas_id'=> auth()->user()->dinas->id,
                                    'status' => 'B'
                                ])->orderByDesc('created_at')->take(5)->get();
                            }
                        @endphp
                        <table id="dataTable" class="table table-hover">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>SPP</th>
                                <th>SPM</th>
                                <th>SP2D</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($dokumens as $dokumen)
                                <tr style="cursor: pointer">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if(isset($dokumen->spp->id))
                                            {{ $dokumen->spp->no_spp }}
                                        @else
                                            <span>-</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($dokumen->spm->id))
                                            {{ $dokumen->spm->no_spm }}
                                        @else
                                            <span>-</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($dokumen->sp2d->id))
                                            {{ $dokumen->sp2d->no_sp2d }}
                                        @else
                                            <span>-</span>
                                        @endif
                                    </td>
                                    <td class="no-sort no-click bread-actions">
                                        <a href="{{ route('upload-dokumen.edit', $dokumen->id) }}"
                                           title="Ubah"
                                           class="btn btn-sm btn-primary pull-right edit">
                                            <i class="voyager-edit"></i>
                                        </a>
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Tidak Ada</td>
                                </tr>
                            @endforelse

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

@stop

@section('javascript')
    {{-- should start with <script> tag  --}}


@stop
