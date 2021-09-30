@if(isset($dokumen->sp2d->no_sp2d))
    <!-- SP2D telah diupload -->
    <div class="panel panel-default border-success">
        <div class="panel-body">

            <div class="form-group">
                <label>No SP2D</label>
                <input class="form-control" name="no_sp2d" type="text" value="{{ $dokumen->sp2d->no_sp2d }}"
                       placeholder="No SP2D" disabled>
            </div>

            <div class="form-group">
                <label>File SP2D</label>
                <br>
                <button class="btn btn-sm btn-success"><i class="voyager-file-text"></i>
                    Tampilkan
                </button>

                <span class="form-group pull-right" data-toggle="tooltip" title="Hapus">
                <button type="button" class="btn btn-danger text-danger"
                        data-toggle="modal" data-target="#sp2d_delete_modal" data-placement="left">
                    <i class="voyager-trash"></i> Hapus
                </button>
            </span>

                <!-- Modal -->
                <div class="modal fade modal-danger" id="sp2d_delete_modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    &times;
                                </button>
                                <h4 class="modal-title"><i class="voyager-warning"></i>Konfirmasi hapus</h4>
                            </div>
                            <div class="modal-body"><h4>Yakin untuk menghapus data ini?</h4></div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                <a type="button" class="btn btn-danger"
                                   href="{{ route('dokumen.sp2d.delete', $dokumen->sp2d->id) }}">Ya, Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ./Modal -->
            </div>
        </div>
    </div>
@else
    <!-- SP2D belum diupload -->
    <div class="panel panel-default border-danger">
        <div class="panel-body">

            <div class="form-group">
                <label>No SP2D</label>
                <input class="form-control" name="no_sp2d" type="text"
                       value="{{ old('no_sp2d') }}" placeholder="No SP2D">
                @error('no_sp2d')
                <span class="text-danger">* {{ $message }}</span>
                @enderror
            </div>

            <div class="form-group sp2d-group">
                <label>File SP2D</label>
                <input type="file" name="file_sp2d" accept="application/pdf">
                @error('file_sp2d')
                <span class="text-danger">* {{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
@endif
