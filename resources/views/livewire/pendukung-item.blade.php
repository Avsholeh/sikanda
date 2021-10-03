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
                    <p><strong>File:</strong> <a href="#">Tampilkan</a></p>
                </div>
                <div class="col-md-2 text-right">
                    <button type="button" class="btn btn-danger text-danger" >
                        <i class="voyager-trash"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
