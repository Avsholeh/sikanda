{{-- Close your eyes. Count to one. That is how long forever feels. --}}
<div>
    <div class="col-md-6">
        <div class="panel panel-bordered">
            <div class="panel-heading">
                <p style="margin-left: 20px; margin-top: 10px; font-weight: bold">Form Dokumen Pendukung</p>
            </div>
            <div class="panel-body">
                <!-- dokumen pendukung -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Nama Dokumen</label>
                            <input wire:model.lazy="namaDokumen" type="text" class="form-control"
                                   placeholder="Nama Dokumen">
                            @error('namaDokumen')<span class="text-danger">* {{ $message }}</span>@enderror
                            @if($errorNamaDokumen)<span class="text-danger">* {{ $errorNamaDokumen }}</span>@endif
                        </div>
                        <div class="form-group">
                            <label>File Dokumen</label>
                            <input wire:model.lazy="fileDokumen" type="file" accept="application/pdf">
                            @error('fileDokumen')
                            <span class="text-danger">* {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <!-- ./dokumen pendukung -->
                <button wire:click="tambahkan"
                        class="btn btn-@if(!$canTambahkan){{ 'default' }}@else{{ 'warning' }}@endif"
                @if(!$canTambahkan){{ "disabled='disabled'" }}@endif>Tambahkan
                </button>
                <span wire:loading wire:target="tambahkan">Sedang menambahkan ....</span>
            </div>
        </div>

        @forelse($dokumens->pendukung as $pendukung)
            <livewire:pendukung-item :pendukungId="$pendukung->id" :wire:key="$pendukung->id"/>
        @empty
            <div class="alert alert-warning">
                Dokumen ini tidak memiliki dokumen pendukung. Anda dapat menambahkannya melalui <strong>Form Dokumen
                    Pendukung</strong> jika diperlukan.
            </div>
        @endforelse
    </div>
</div>

