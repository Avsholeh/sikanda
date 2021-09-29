@if(isset($dokumen->spm->no_spm))
    <!-- SPM telah diupload -->
    <div class="panel panel-default border-success">
        <div class="panel-body">
            <div class="form-group">
                <label>No SPM</label>
                <input class="form-control" name="no_spm" type="text" value="{{ $dokumen->spm->no_spm }}"
                       placeholder="No SPM" disabled>

                @error('no_spm')
                <span class="text-danger">* {{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>File SPM</label>
                @if(!isset($dokumen->spm->file))
                    <input type="file" name="file_spm" accept="application/pdf">
                    @error('file_spm')
                    <span class="text-danger">* {{ $message }}</span>
                    @enderror
                @else
                    <button class="btn btn-sm btn-success" style="display: block"><i class="voyager-file-text"></i> Tampilkan</button>
                @endif
            </div>

            <span class="form-group pull-right">
                <a class="text-danger font-size-20" href="#" data-toggle="tooltip" data-placement="left"
                   title="Hapus">
                    <i class="voyager-trash"></i>
                </a>
            </span>
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
