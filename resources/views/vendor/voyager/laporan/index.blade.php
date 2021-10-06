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
                    <div class="panel panel-bordered">
                        <div class="panel-heading">
                            <p style="margin-left: 20px; margin-top: 10px; font-weight: bold">Form Pencarian</p></div>
                        <div class="panel-body">
                            <!-- Kategori -->
                            <div class="form-group">
                                <label class="">Kategori</label>
                                <select name="kategori" class="form-control">
                                    <option value="no_sp2d" selected>No SP2D</option>
                                </select>
                                @error('kategori')
                                <span class="text-danger">* {{ $message }}</span>
                                @enderror
                            </div>
                            <div id="kolom_pencarian" class="form-group">
                                <label>No SP2D</label>
                                <input class="form-control" name="kolom_pencarian" type="text"
                                       value="@if(isset($pencarianText)){{ $pencarianText }}@endif"
                                       placeholder="No SP2D">
                                @if(isset($pencarianText))
                                    <span style="cursor: pointer" id="bersihkan" class="pull-right text-primary">Bersihkan</span>
                                @endif
                                @error('kolom_pencarian')
                                <span class="text-danger">* {{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="panel-footer">
                            <button type="submit" class="btn btn-block btn-primary">
                                <i class="voyager-search"></i> Cari
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="panel panel-bordered">
                        <div class="panel-heading">
                            <p style="margin-left: 20px; margin-top: 10px; font-weight: bold">Hasil Pencarian</p>
                        </div>

                        <div class="panel-body">
                            @if(isset($dokumens))
                                <p class="text-muted" style="margin-bottom: 1.5em">Menampilkan hasil pencarian dari:
                                    <strong>{{ $pencarianText }}</strong></p>
                                <hr>
                                @forelse($dokumens as $dokumen)
                                    <div class="panel panel-default border-primary">
                                        <div class="panel-body">
                                            <div class="row" style="margin: 0; padding-top: 2em">
                                                <div class="col-12 col-md-2 text-center"
                                                     style="margin-bottom: 0">
                                                    <i class="voyager-documentation" style="font-size: 4em"></i>
                                                </div>
                                                <div class="col-12 col-md-10" style="margin-bottom: 0">
                                                    <div class="row" style="margin: 0">
                                                        <div class="col-md-6" style="margin-bottom: 0">
                                                            <p><strong>Tanggal: </strong> {{ $dokumen->created_at }}</p>
                                                            @if($dokumen->status === 'S')
                                                                <p><strong>Status: </strong>
                                                                    <span class="badge bg-success">Sudah Tuntas</span>
                                                                </p>
                                                            @else
                                                                <p><strong>Status: </strong>
                                                                    <span class="badge bg-danger">Belum Tuntas</span>
                                                                </p>
                                                            @endif
                                                            <p><strong>Dinas: </strong> {{ $dokumen->dinas->nm_dinas }}
                                                            </p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p><strong>SPP: </strong> {{ $dokumen->spp->no_spp }}</p>
                                                            <p><strong>SPM: </strong> {{ $dokumen->spm->no_spm }}</p>
                                                            <p><strong>SP2D: </strong> {{ $dokumen->sp2d->no_sp2d }}</p>
                                                            <p>
                                                                <strong>Pendukung: </strong> {{ $dokumen->pendukung->count() }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @empty

                                    <div class="text-center">
                                        <i class="voyager-search" style="font-size: 3em"></i>
                                        <p>Hasil pencarian belum ditemukan.</p>
                                    </div>

                                @endforelse

                                {{ $dokumens->links() }}
                            @else
                                <div class="text-center">
                                    <i class="voyager-search" style="font-size: 3em"></i>
                                    <p>Hasil pencarian belum ditemukan.</p>
                                </div>
                            @endif
                        </div>
                    </div>
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
                $("input[name=kolom_pencarian]").attr("placeholder", kategori);
            });

            $("#bersihkan").click(function() {
                $("input[name=kolom_pencarian]").val("");
            });
        });
    </script>
@endpush