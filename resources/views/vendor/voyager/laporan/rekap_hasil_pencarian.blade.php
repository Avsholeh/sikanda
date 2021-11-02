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
        @if(isset($rekapDokumen))
            <table class="table table-hover table-striped table-responsive">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Dinas</th>
                    <th>SPP</th>
                    <th>SPM</th>
                    <th>SP2D</th>
                    <th>Pendukung</th>
                </tr>
                </thead>
                <tbody>
                @foreach($rekapDokumen as $index => $rekap)
                <tr>
                    <td>{{ ++$index }}</td>
                    <td>{{ $rekap->dinas }}</td>
                    <td>{{ $rekap->spp }}</td>
                    <td>{{ $rekap->spm }}</td>
                    <td>{{ $rekap->sp2d }}</td>
                    <td>{{ $rekap->pendukung }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <div class="text-center">
                <i class="voyager-search" style="font-size: 3em"></i>
                <p>Hasil pencarian belum ditemukan.</p>
            </div>
        @endif
    </div>
</div>