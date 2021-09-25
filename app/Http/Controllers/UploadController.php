<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function index()
    {
        return view('vendor.voyager.upload.index');
    }

    public function uploadUtama(Request $request)
    {
        $request->validate([
            'no_spp' => 'required',
            'file_spp' => 'required',
        ]);
    }

    public function uploadPendukung()
    {

    }

    public function edit($id)
    {
        return view('vendor.voyager.upload.edit');
    }
}
