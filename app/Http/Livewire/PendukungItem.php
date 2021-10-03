<?php

namespace App\Http\Livewire;

use App\Models\Pendukung;
use Livewire\Component;

class PendukungItem extends Component
{
    public $pendukung;
    public $pendukungId;

    public function mount()
    {
        $this->pendukung = Pendukung::find($this->pendukungId);
    }

    public function render()
    {
        return view('livewire.pendukung-item');
    }
}
