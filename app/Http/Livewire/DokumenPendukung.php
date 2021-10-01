<?php

namespace App\Http\Livewire;

use App\Models\Dokumen;
use App\Models\Pendukung;
use Livewire\Component;
use Livewire\WithFileUploads;

class DokumenPendukung extends Component
{
    use WithFileUploads;

    public $dokumenId;
    public $dokumens;
    public $namaDokumen;
    public $fileDokumen;

    protected $rules = [
        'namaDokumen' => 'required',
        'fileDokumen' => 'required',
    ];

    public $errorNamaDokumen;

    public function mount()
    {
        $this->dokumens = Dokumen::find($this->dokumenId);
    }

    public function tambahkan()
    {
        $this->validate();
        $this->errorNamaDokumen = null;

        $countPendukung = Pendukung::where([
            'dokumen_id' => $this->dokumenId,
            'nama_dokumen' => $this->namaDokumen
        ])->count();

        if (!$countPendukung) {
            Pendukung::create([
                'dokumen_id' => $this->dokumenId,
                'nama_dokumen' => $this->namaDokumen,
                'file' => $this->fileDokumen,
            ]);
        } else {
            $this->errorNamaDokumen = "Nama dokumen tidak boleh sama.";
        }

    }

    public function render()
    {
        return view('livewire.dokumen-pendukung');
    }
}
