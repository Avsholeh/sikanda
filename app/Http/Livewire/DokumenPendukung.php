<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class DokumenPendukung extends Component
{
    use WithFileUploads;

    public $namaDokumen;
    public $fileDokumen;
    public $dokumenPendukung = [];

    public function tambahkan()
    {
        array_push($this->dokumenPendukung, [
            'nama' => $this->namaDokumen,
            'file' => $this->fileDokumen
        ]);
        $this->namaDokumen = "";
        $this->fileDokumen = "";
    }

    public function render()
    {
        return view('livewire.dokumen-pendukung');
    }
}
