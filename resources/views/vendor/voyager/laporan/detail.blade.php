@section('pre_css')
    <style>
        .row > [class*=col-] {
            margin-bottom: 0 !important;
        }
    </style>
@endsection
<div class="panel panel-bordered">
    <div class="panel-heading">
        <p style="margin-left: 20px; margin-top: 10px; font-weight: bold">Detail Laporan</p>
    </div>
    <div class="panel-body">

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12"><strong>Tahun</strong><br>{{ $dokumen->tahun }}</div>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-8">
                        <strong>No SPP</strong><br>
                        {{ $dokumen->spp->no_spp }}<br>
                        <small><i>diupload pada {{ $dokumen->spp->created_at }}</i></small>
                    </div>
                    <div class="col-md-4 text-right">
                        <button type="button" data-toggle="modal" data-target="#pdf_modal"
                                data-jenis="spp" data-id="{{ $dokumen->spp->id }}" data-no="{{ $dokumen->spp->no_spp }}"
                                class="btn btn-sm btn-success tampilkan"><i class="voyager-file-text"></i>
                            Tampilkan
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-8">
                        <strong>No SPM</strong><br>
                        {{ $dokumen->spm->no_spm }}<br>
                        <small><i>diupload pada {{ $dokumen->spm->created_at }}</i></small>
                    </div>
                    <div class="col-md-4 text-right">
                        <button type="button" data-toggle="modal" data-target="#pdf_modal"
                                data-jenis="spm" data-id="{{ $dokumen->spm->id }}" data-no="{{ $dokumen->spm->no_spm }}"
                                class="btn btn-sm btn-success tampilkan"><i class="voyager-file-text"></i>
                            Tampilkan
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-8">
                        <strong>No SP2D</strong><br>
                        {{ $dokumen->sp2d->no_sp2d }}<br>
                        <small><i>diupload pada {{ $dokumen->sp2d->created_at }}</i></small>
                    </div>
                    <div class="col-md-4 text-right">
                        <button type="button" data-toggle="modal" data-target="#pdf_modal"
                                data-jenis="sp2d" data-id="{{ $dokumen->sp2d->id }}" data-no="{{ $dokumen->sp2d->no_sp2d }}"
                                class="btn btn-sm btn-success tampilkan"><i class="voyager-file-text"></i>
                            Tampilkan
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade modal-primary" id="pdf_modal" data-backdrop="static">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            &times;
                        </button>
                        <h4 class="modal-title"><i class="voyager-documentation"></i>
                            <span id="modal-title-dokumen"></span>
                        </h4>
                    </div>
                    <div class="modal-body" style="padding: .3em">
                        <iframe id="modal-file-dokumen" src="" height="600" width="100%"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./Modal -->

    </div>
</div>


@push('javascript')
    <script>
        $(function () {
            // let baseSrc = "data:application/pdf;base64,";
            let baseSrc = "{{route('voyager.dashboard')}}/ViewerJS/#{{route('voyager.dashboard')}}/viewer/";
            $(".tampilkan").click(function (e) {
                let dataId = $(e.target).data('id');
                let dataNo = $(e.target).data('no');
                let dataJenis = $(e.target).data('jenis');

                $("#modal-file-dokumen").attr('src', '');

                let req = $.ajax({
                    url: "{{ route('viewer.generate') }}",
                    method: "POST",
                    data: { dokumen_id: dataId, jenis_dokumen: dataJenis }
                })
                req.done(function (response, textStatus, jqXHR) {
                    $("#modal-file-dokumen").attr('src', baseSrc + dataId + '/' + dataJenis + '/' + response);
                });
                req.fail(function (jqXHR, textStatus, errorThrown) {
                    console.log(errorThrown)
                })
                $("#modal-title-dokumen").text(dataNo);
            });
        });

    </script>
@endpush
