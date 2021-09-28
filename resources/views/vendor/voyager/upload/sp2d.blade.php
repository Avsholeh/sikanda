@if(isset($dokumen->spm->no_sp2d))
    <div class="panel panel-default border-success">
        <div class="panel-body">
            <div class="form-group">
                <label>No SP2D</label>
                <input class="form-control" name="no_sp2d" type="text"
                       value="{{ $dokumen->sp2d->no_sp2d }}" placeholder="No SP2D">
            </div>

            <div class="form-group">
                <label>File SP2D</label>
                <input type="file" name="file_sp2d" placeholder="No SP2D">
            </div>

            <div class="form-group">
                <label>Status</label>
                <div style="margin-bottom: 0 !important;">
                    <div class="badge bg-success">
                        <i class="voyager-check"></i> Sudah Upload
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="panel panel-default border-danger">
        <div class="panel-body">
            <div class="form-group">
                <label>No SP2D</label>
                <input class="form-control" name="no_sp2d" type="text"
                       value="{{ old('no_sp2d') }}" placeholder="No SP2D">
            </div>

            <div class="form-group">
                <label>File SP2D</label>
                <input type="file" name="file_sp2d" placeholder="No SP2D">
            </div>

            <div class="form-group">
                <label>Status</label>
                <div style="margin-bottom: 0 !important;">
                    <div class="badge bg-danger">
                    <i class="voyager-x"></i> Belum Upload
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif