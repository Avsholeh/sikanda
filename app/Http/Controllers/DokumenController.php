<?php

namespace App\Http\Controllers;

class DokumenController extends Controller
{
    public function index($status = null)
    {
        return view('vendor.voyager.dokumen.index', [
            'status' => $status
        ]);
    }
}
