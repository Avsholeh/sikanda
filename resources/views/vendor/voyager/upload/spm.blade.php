@if(isset($dokumen->spm->no_spm))
    <div class="panel panel-default border-success">
        <div class="panel-body">
            <div class="form-group">
                <label>No SPM</label>
                <input class="form-control" name="no_spm" type="text"
                       value="{{ $dokumen->spm->no_spm }}" placeholder="No SPM">
            </div>

            <div class="form-group">
                <label>File SPM</label>
                <input type="file" name="file_spm" placeholder="No SPM">
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
                <label>No SPM</label>
                <input class="form-control" name="no_spm" type="text"
                       value="{{ old('no_spm') }}" placeholder="No SPM">
            </div>

            <div class="form-group">
                <label>File SPM</label>
                <input type="file" name="file_spm" placeholder="No SPM">
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