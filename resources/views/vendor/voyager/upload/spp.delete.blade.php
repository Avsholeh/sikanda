@if(isset($dokumen->spp->no_spp))
    <!-- SPP telah diupload -->
    <div class="panel panel-default border-success">
        <div class="panel-body">
            <div class="form-group">
                <label class="">Tahun</label>
                <input class="form-control" name="no_spp" type="text"
                       value="{{ $dokumen->tahun }}" placeholder="No SPP" disabled>
            </div>

            <div class="form-group">
                <label class="">No SPP</label>
                <input class="form-control" name="no_spp" type="text"
                       value="{{ $dokumen->spp->no_spp }}" placeholder="No SPP" disabled>
            </div>

            <div class="form-group">
                <label>File SPP</label>
                <br>
                <button class="btn btn-sm btn-success"><i class="voyager-file-text"></i>
                    Tampilkan
                </button>

                <span class="form-group pull-right" data-toggle="tooltip" title="Hapus">
                    <button type="button" class="btn btn-danger text-danger" data-toggle="modal"
                            data-target="#spp_delete_modal" data-placement="left">
                        <i class="voyager-trash"></i> Hapus
                    </button>
                </span>
                <!-- Modal -->
                <div class="modal fade modal-danger" id="spp_delete_modal">
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
                            <div class="modal-body"><h4>Yakin untuk menghapus data ini?</h4></div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                <a type="button" class="btn btn-danger"
                                   href="{{ route('dokumen.spp.delete', $dokumen->spp->id) }}">Ya, Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ./Modal -->
            </div>
        </div>
    </div>

@else

    <!-- SPP belum diupload -->
    <div class="panel panel-default border-danger">
        <div class="panel-body">

            <div class="form-group">
                <label>No SPP</label>
                <input class="form-control" name="no_spp" type="text"
                       value="{{ old('no_spp') }}" placeholder="No SPP">
                @error('no_spp')
                <span class="text-danger">* {{ $message }}</span>
                @enderror
            </div>

            <div class="form-group sp2d-group">
                <label>File SPP</label>
                <input type="file" name="file_spp" accept="application/pdf">
                @error('file_spp')
                <span class="text-danger">* {{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

@endif