<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
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
            'no_spp' => 'required|regex:/^\S*$/u|unique:tb_spp,no_spp',
            'file_spp' => 'required|mimes:pdf|max:10240',
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

    public function edit(Dokumen $dokumen)
    {
        return view('vendor.voyager.upload.edit', compact('dokumen'));
    }

    public function update(Request $request, Dokumen $dokumen)
    {
        // validate spm form
        if ($request->post('no_spm') or $request->post('file_spm')) {
            $request->validate([
                'no_spm' => 'required|regex:/^\S*$/u|unique:tb_spm,no_spm',
                'file_spm' => 'required|mimes:pdf|max:10240',
            ]);
            $dokumen->spm()->create([
                'no_spm' => $request->post('no_spm'),
                'file' => base64_encode($request->file('file_spm')),
            ]);
        }

        // validate sp2d form
        if ($request->post('no_sp2d') or $request->post('file_sp2d')) {
            $request->validate([
                'no_sp2d' => 'required|regex:/^\S*$/u|unique:tb_sp2d,no_sp2d',
                'file_sp2d' => 'required|mimes:pdf|max:10240',
            ]);
            $dokumen->sp2d()->create([
                'no_sp2d' => $request->post('no_sp2d'),
                'file' => base64_encode($request->file('file_sp2d')),
            ]);
        }

        // validate dokumen pendukung form


        // check status
        $status = (isset($dokumen->spm) and isset($dokumen->sp2d)) ? 'S' : 'B';
        $dokumen->update(['status' => $status]);
        return redirect()->route('dokumen.index')->with([
            'message' => "Dokumen telah berhasil diperbarui",
            'alert-type' => 'success',
        ]);
    }

}
