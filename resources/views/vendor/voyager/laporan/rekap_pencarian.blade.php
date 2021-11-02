<form action="{{ route('laporan.rekap_pencarian') }}" method="POST" enctype="multipart/form-data"
      autocomplete="off">
    @csrf
    <div class="panel panel-bordered">
        <div class="panel-heading">
            <p style="margin-left: 20px; margin-top: 10px; font-weight: bold">Form Pencarian</p></div>
        <div class="panel-body">

            <div class="form-group">
                <label class="">Dinas</label>
                <select name="dinas" class="form-control">
                    @if(in_array(auth()->user()->custom_role->id, [App\Models\User::$ROLE_DEV, App\Models\User::$ROLE_SUPERADMIN]))
                    <option value="semua">SEMUA</option>
                    @endif
                    @foreach($dinasSelect as $dns)
                        @if(isset($dinasSelected))
                        <option value="{{ $dns->id }}" @if($dinasSelected == $dns->id){{ 'selected' }}@endif>
                            {{ $dns->nm_dinas }}
                        </option>
                        @else
                        <option value="{{ $dns->id }}">{{ $dns->nm_dinas }}</option>
                        @endif
                    @endforeach
                </select>
                @error('dinas')
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