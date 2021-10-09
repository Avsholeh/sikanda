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
                                        <p><strong>Dinas: </strong> {{ $dokumen->dinas->nm_dinas ?? '-' }}
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