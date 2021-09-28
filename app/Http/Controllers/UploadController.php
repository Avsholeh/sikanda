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
        // validasi input user
        $request->validate([
            'tahun' => 'required|size:4',
            'no_spp' => 'required|unique:tb_spp,no_spp',
            'file_spp' => 'required|file|max:10240',
        ]);

        // set dinas sesuai user kecuali superadmin
        if (auth()->user()->role_id === 1) {
            $dinas_id = 00;
        } else {
            $dinas_id = auth()->user()->dinas_id;
        }

        // create dokumen baru
        $newDokumen = Dokumen::create([
            'dinas_id' => $dinas_id,
            'status' => 'B', // belum tuntas
            'tahun' => $request->post('tahun'),
        ]);

        // create spp baru dengan hasOne ke dokumen
        Spp::create([
            'dokumen_id' => $newDokumen->id,
            'no_spp' => $request->post('no_spp'),
            'file' => base64_encode($request->post('file_spp')),
        ]);

        // redirect ke halaman perbarui/edit
        return redirect()->route('upload-dokumen.edit', $newDokumen->id)->with([
            'message' => "SPP telah berhasil ditambahkan",
            'alert-type' => 'success',
        ]);
    }

    public function edit($id)
    {
        $dokumen = Dokumen::findOrFail($id);
        return view('vendor.voyager.upload.edit', compact('dokumen'));
    }

    public function update()
    {

    }

    private function updateSPP(Request $request)
    {
        $request->validate([
            'no_spp' => 'required|alpha_dash'
        ]);
    }
}
