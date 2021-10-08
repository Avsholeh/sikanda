@if(isset($dokumen->spm->no_spm))
    <!-- SPM telah diupload -->
    <div class="panel panel-default border-success">
        <div class="panel-body">

            <div class="form-group">
                <label>No SPM</label>
                <input class="form-control" name="no_spm" type="text" value="{{ $dokumen->spm->no_spm }}"
                       placeholder="No SPM" disabled>
            </div>

            <div class="form-group">
                <label>File SPM</label>
                <br>
                <button type="button" onclick="document.getElementById('form_spm').submit()"
                        class="btn btn-sm btn-success"><i class="voyager-file-text"></i>
                    Tampilkan
                </button>

                <span class="form-group pull-right" title="Hapus">
                    <button type="button" class="btn btn-danger text-danger"
                            data-toggle="modal" data-target="#spm_delete_modal">
                        <i class="voyager-trash"></i>
                    </button>
                </span>

                <!-- Modal -->
                <div class="modal fade modal-danger" id="spm_delete_modal">
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
                                   href="{{ route('dokumen.spm.delete', $dokumen->spm->id) }}">Ya, Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ./Modal -->
            </div>
        </div>
    </div>

@else
    <!-- SPM belum diupload -->
    <div class="panel panel-default border-danger">
        <div class="panel-body">
            <div class="form-group">
                <label>No SPM</label>
                <input class="form-control" name="no_spm" type="text"
                       value="{{ old('no_spm') }}" placeholder="No SPM">
                @error('no_spm')
                <span class="text-danger">* {{ $message }}</span>
                @enderror
            </div>

            <div class="form-group spm-group">
                <label>File SPM</label>
                <input type="file" name="file_spm" accept="application/pdf">
                @error('file_spm')
                <span class="text-danger">* {{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
@endif
