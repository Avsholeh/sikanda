@section('pre_css')
    <style>
        .row>[class*=col-] {
            margin-bottom: 0 !important;
        }
    </style>
@endsection

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
                        <div class="row" style="">
                            <div class="col-12 col-md-4 text-center">
                                <i class="voyager-documentation" style="font-size: 4em"></i>
                                <a href="{{ route('laporan.detail', $dokumen->id) }}" class="btn btn-default btn-block">
                                    <i class="voyager-eye" style="font-size: .8em"></i> Lihat Detail</a>
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><strong>ID: </strong> {{ $dokumen->id }}</p>
                                        <p><strong>Tanggal: </strong> {{ $dokumen->created_at }}</p>
                                        @switch($dokumen->status)
                                            @case(\App\Models\Dokumen::BELUM_TUNTAS)
                                            <p><strong>Status: </strong>
                                                <span class="badge bg-danger">Belum Tuntas</span>
                                            </p>
                                            @break
                                            @case(\App\Models\Dokumen::SUDAH_TUNTAS)
                                            <p><strong>Status: </strong>
                                                <span class="badge badge-primary">Sudah Tuntas</span>
                                            </p>
                                            @break
                                            @case(\App\Models\Dokumen::VERIFIKASI)
                                            <p><strong>Status: </strong>
                                                <span class="badge badge-success">Verifikasi</span>
                                            </p>
                                            @break
                                        @endswitch
                                        <p><strong>Dinas: </strong> {{ $dokumen->dinas->nm_dinas ?? '-' }}
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>SPP: </strong> {{ $dokumen->spp->no_spp }}</p>
                                        <p><strong>SPM: </strong> {{ $dokumen->spm->no_spm }}</p>
                                        <p><strong>SP2D: </strong> {{ $dokumen->sp2d->no_sp2d }}</p>
                                        <p><strong>Pendukung: </strong> {{ $dokumen->pendukung->count() }}</p>
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
        @else
            <div class="text-center">
                <i class="voyager-search" style="font-size: 3em"></i>
                <p>Hasil pencarian belum ditemukan.</p>
            </div>
        @endif
    </div>
</div>