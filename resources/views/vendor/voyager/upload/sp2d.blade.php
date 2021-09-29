@if(isset($dokumen->sp2d->no_sp2d))
    <!-- SP2D telah diupload -->
    <div class="panel panel-default border-success">
        <div class="panel-body">
            <input type="hidden" name="sp2d_uploaded" value="1">
            <div class="form-group">
                <label>No SP2D</label>
                <input class="form-control" name="no_sp2d" type="text" value="{{ $dokumen->sp2d->no_sp2d }}"
                       placeholder="No SP2D" disabled>
            </div>

            <div class="form-group">
                <label>File SP2D</label>
                @if(!isset($dokumen->sp2d->file))
                    <input type="file" name="file_sp2d" accept="application/pdf">
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
    <!-- SP2D belum diupload -->
    <div class="panel panel-default border-danger">
        <div class="panel-body">
            <input type="hidden" name="sp2d_uploaded" value="0">
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

            <span class="form-group pull-right">
                <a class="text-danger font-size-20" href="#"><i class="voyager-trash"></i></a>
            </span>
        </div>
    </div>
@endif
