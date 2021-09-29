<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;

class DokumenController extends Controller
{
    public function index($status = null)
    {
        $dokumens = Dokumen::paginate(2);
        return view('vendor.voyager.dokumen.index', [
            'dokumens' => $dokumens,
            'status' => $status
        ]);
    }
}
