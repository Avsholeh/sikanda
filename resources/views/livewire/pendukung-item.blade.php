<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-2 text-center" style="margin-bottom: 0">
                    <i class="voyager-documentation" style="font-size: 2.5em"></i>
                </div>
                <div class="col-md-8" style="margin-bottom: 0">
                    <p><strong>Nama Dokumen:</strong> {{ $pendukung->nama_dokumen }}</p>
                    <p><strong>Tanggal:</strong> {{ $pendukung->created_at }}</p>
                    <p><strong>File:</strong>
                        <a class="tampilkan" href="#" data-toggle="modal" data-target="#pdf_modal" data-jenis="pendukung"
                           data-id="{{ $pendukung->id }}" data-no="{{ $pendukung->nama_dokumen }}">Tampilkan</a>
                    </p>
                </div>
                @can('delete', $pendukung)
                    <div class="col-md-2 text-right">
                        <button type="button" class="btn btn-danger text-danger"
                                data-toggle="modal" data-target="#pendukung_delete_modal_{{ $pendukung->id }}">
                            <i class="voyager-trash"></i>
                        </button>
                    </div>
                @endcan
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade modal-danger" id="pendukung_delete_modal_{{ $pendukung->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title"><i class="voyager-warning"></i>
                        Konfirmasi hapus
                    </h4>
                </div>

                <div class="modal-body">
                    <h4>Yakin untuk menghapus data ini?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <a type="button" class="btn btn-danger"
                       href="{{ route('dokumen.pendukung.delete', $pendukung->id) }}">Ya, Hapus</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ./Modal -->
</div>
