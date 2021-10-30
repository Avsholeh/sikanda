<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;

class VerifikasiController extends Controller
{
    public function show(Dokumen $dokumen)
    {
        return view('vendor.voyager.verifikasi.show', compact('dokumen'));
    }

    public function proses()
    {

    }
}
