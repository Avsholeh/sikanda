<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\Sp2d;
use App\Models\Spm;
use App\Models\Spp;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class UploadController extends Controller
{
    public function index()
    {
        return view('vendor.voyager.upload.index');
    }

    public function image_base64($requestFile) // $request->file('nama_file')
    {
        $image = Image::make($requestFile->path())->encode('png');
        return base64_encode($image);
    }

    public function upload(Request $request)
    {
        $validateAttribute = [
            'no_spp' => 'required',
            'file_spp' => 'required',
        ];


        $request->validate($validateAttribute);

        if ($request->post('no_spm') and $request->post('no_sp2d')) {
            $status = 'Tuntas';
        } else {
            $status = 'Belum tuntas';
        }

        if (auth()->user()->role_id === 1 or auth()->user()->role_id === 2) {
            $dinas_id = 99;
        } else {
            $dinas_id = auth()->user()->dinas_id;
        }

        $dokumenUploaded = Dokumen::create([
            'dinas_id' => $dinas_id,
            'status' => $status,
            'tahun' => 2021
        ]);

        $sppUploaded = Spp::create([
            'dokumen_id' => $dokumenUploaded->id,
            'no_spp' => $request->post('no_spp'),
            'file' => base64_encode($request->post('file_spp')),
        ]);

        // Jika date spm tersedia
        $spmUploaded = null;
        if ($request->post('no_spm') and $request->post('file_spm')) {
            $spmUploaded = Spm::create([
                'dokumen_id' => $dokumenUploaded->id,
                'no_spm' => $request->post('no_spm'),
                'file' => base64_encode($request->post('file_spm')),
            ]);
        }

        // Jika data sp2d tersedia
        $sp2dUploaded = null;
        if ($request->post('no_sp2d') and $request->post('file_sp2d')) {
            $sp2dUploaded = Sp2d::create([
                'dokumen_id' => $dokumenUploaded->id,
                'no_spm' => $request->post('no_sp2d'),
                'file' => base64_encode($request->post('file_sp2d')),
            ]);
        }

        return redirect()->back()->with([
            'message' => "Telah berhasil ditambahkan",
            'alert-type' => 'success',
        ]);
    }

    public function edit($id)
    {
        $dokumen = Dokumen::findOrFail($id)->get();
        dd($dokumen->spp);
        return view('vendor.voyager.upload.edit', compact('id'));
    }

    public function updateUpload()
    {

    }
}
