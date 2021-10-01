{{-- Close your eyes. Count to one. That is how long forever feels. --}}
<div>
    <div class="col-md-6">
        <div class="panel panel-bordered">
            <div class="panel-heading">
                <p style="margin-left: 20px; margin-top: 10px; font-weight: bold">Form Dokumen Pendukung</p>
            </div>
            <div class="panel-body">
                <!-- dokumen pendukung -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Nama Dokumen</label>
                            <input wire:model="namaDokumen" type="text" class="form-control"
                                   placeholder="Nama Dokumen">
                            @error('namaDokumen')<span class="text-danger">* {{ $message }}</span>@enderror
                            @if($errorNamaDokumen)<span class="text-danger">* {{ $errorNamaDokumen }}</span>@endif
                        </div>
                        <div class="form-group">
                            <label>File Dokumen</label>
                            <input wire:model="fileDokumen" type="file" accept="application/pdf">
                            @error('fileDokumen')
                            <span class="text-danger">* {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <!-- ./dokumen pendukung -->
                <button wire:click="tambahkan" class="btn btn-warning">Tambahkan</button>
                <span wire:loading wire:target="tambahkan">Sedang menambahkan ....</span>
            </div>
        </div>

        @forelse($dokumens->pendukung as $pendukung)
            <div class="panel panel-default border-success">
                <div class="panel-body">
                    <div class="form-group">
                        <label>Nama Dokumen</label>
                        <input class="form-control" name="nama_dokumen" type="text"
                               value="{{ $pendukung->nama_dokumen }}" placeholder="Nama Dokumen" disabled>
                    </div>
                    <div class="form-group">
                        <label>File Dokumen</label>
                        <br>
                        <button class="btn btn-sm btn-success"><i class="voyager-file-text"></i>
                            Tampilkan
                        </button>

                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-warning">
                Dokumen ini tidak memiliki dokumen pendukung. Anda dapat menambahkannya melalui <strong>Form Dokumen
                    Pendukung</strong> jika diperlukan.
            </div>
        @endforelse
    </div>


</div>
{{--            <span class="form-group pull-right" title="Hapus">--}}
{{--                    <button type="button" class="btn btn-danger text-danger"--}}
{{--                            data-toggle="modal" data-target="#dokumen_pendukung_modal">--}}
{{--                        <i class="voyager-trash"></i>--}}
{{--                    </button>--}}
{{--                </span>--}}
<!-- Modal -->
{{--    <div class="modal fade modal-danger" id="dokumen_pendukung_modal">--}}
{{--        <div class="modal-dialog">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">--}}
{{--                        &times;--}}
{{--                    </button>--}}
{{--                    <h4 class="modal-title"><i class="voyager-warning"></i>--}}
{{--                        Konfirmasi hapus--}}
{{--                    </h4>--}}
{{--                </div>--}}

{{--                <div class="modal-body">--}}
{{--                    <h4>Yakin untuk menghapus data ini?</h4>--}}
{{--                </div>--}}
{{--                <div class="modal-footer">--}}
{{--                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>--}}
{{--                    <a type="button" class="btn btn-danger"--}}
{{--                       href="#">Ya, Hapus</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
<!-- ./Modal -->

