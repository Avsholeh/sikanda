<?php

namespace App\Http\Livewire;

use App\Models\Dokumen;
use App\Models\Pendukung;
use Livewire\Component;
use Livewire\WithFileUploads;

class PendukungList extends Component
{
    use WithFileUploads;

    public $dokumenId;
    public $dokumens;
    public $namaDokumen;
    public $fileDokumen;
    public $canTambahkan;

    protected $rules = [
        'namaDokumen' => 'required',
        'fileDokumen' => 'required',
    ];

    public $errorNamaDokumen;

    public function mount()
    {
        $this->dokumens = Dokumen::find($this->dokumenId);
    }

    public function updated()
    {
        if ($this->namaDokumen && $this->fileDokumen) $this->canTambahkan = true;
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
                'file' => $this->pdfEncode($this->fileDokumen),
            ]);
        } else {
            $this->errorNamaDokumen = "Nama dokumen tidak boleh sama.";
        }

        $this->mount();
        $this->reset(['namaDokumen', 'fileDokumen']);
    }

    private function pdfEncode($requestFile)
    {
        return base64_encode(file_get_contents($requestFile->path()));
    }

    public function render()
    {
        return view('livewire.pendukung-list');
    }
}
