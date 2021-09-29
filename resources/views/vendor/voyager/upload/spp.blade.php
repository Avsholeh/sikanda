<div class="panel panel-default border-success">
    <div class="panel-body">
        <div class="form-group">
            <label class="">No SPP</label>
            <input class="form-control" name="no_spp" type="text"
                   value="{{ $dokumen->spp->no_spp }}" placeholder="No SPP" disabled>
        </div>


        <div class="form-group">
            <label>File SPP</label>
            @if(!isset($dokumen->spp->file))
                <input type="file" name="file_spp" accept="application/pdf">
            @else
                <button class="btn btn-sm btn-success" style="display: block"><i class="voyager-file-text"></i> Tampilkan</button>
            @endif
        </div>
    </div>
</div>