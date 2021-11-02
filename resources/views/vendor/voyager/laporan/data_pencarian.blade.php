<form action="{{ route('laporan.pencarian') }}" method="POST" enctype="multipart/form-data"
      autocomplete="off">
    @csrf
    <div class="panel panel-bordered">
        <div class="panel-heading">
            <p style="margin-left: 20px; margin-top: 10px; font-weight: bold">Form Pencarian</p></div>
        <div class="panel-body">
            <!-- Kategori -->
            <div class="form-group">
                <label class="">Kategori</label>
                <select name="kategori" class="form-control">
                    <option value="no_sp2d" selected>No SP2D</option>
                    <option value="no_spm">No SPM</option>
                    <option value="no_spp">No SPP</option>
                </select>
                @error('kategori')
                <span class="text-danger">* {{ $message }}</span>
                @enderror
            </div>
            <div id="kolom_pencarian" class="form-group">
                <label>No SP2D</label>
                <input class="form-control" name="kolom_pencarian" type="text"
                       value="@if(isset($pencarianText)){{ $pencarianText }}@endif"
                       placeholder="No SP2D" autofocus>
                <span style="cursor: pointer" id="bersihkan" class="pull-right text-primary">Bersihkan</span>
                @error('kolom_pencarian')
                <span class="text-danger">* {{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="panel-footer">
            <button type="submit" class="btn btn-block btn-primary">
                <i class="voyager-search"></i> Cari
            </button>
        </div>
    </div>
</form>