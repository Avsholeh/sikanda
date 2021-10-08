@if(isset($dokumen->spp->no_spp))
    <!-- SPP telah diupload -->
    <div class="panel panel-default border-success">
        <div class="panel-body">
            <div class="form-group">
                <label class="">Tahun</label>
                <input class="form-control" name="tahun" type="number"
                       value="{{ $dokumen->tahun }}" placeholder="Tahun" disabled>
                @error('tahun')
                <span class="text-danger">* {{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label class="">No SPP</label>
                <input class="form-control" name="no_spp" type="text"
                       value="{{ $dokumen->spp->no_spp }}" placeholder="No SPP" disabled>
                @error('no_spp')
                <span class="text-danger">* {{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>File SPP</label>
                <br>
                <button type="button" data-toggle="modal" data-target="#pdf_modal"
                        data-jenis="spp" data-id="{{ $dokumen->spp->id }}" data-no="{{ $dokumen->spp->no_spp }}"
                        class="btn btn-sm btn-success tampilkan">
                    <i class="voyager-file-text"></i> Tampilkan
                </button>
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