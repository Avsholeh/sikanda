<?php

namespace App\Http\Controllers;

use App\Models\Dinas;
use App\Models\Dokumen;
use App\Models\Spp;
use App\Models\User;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function checkPermission(Dokumen $dokumen)
    {
        $auth = [User::$ROLE_SUPERADMIN, User::$ROLE_DEV];
        if (!in_array(auth()->user()->custom_role->id, $auth)) {
            if ($dokumen and $dokumen->dinas_id !== auth()->user()->dinas_id) {
                abort(401);
            }
        }
    }

    public function index()
    {
        $dinas = Dinas::all();
        $currentYear = date('Y');
        $tahun = range($currentYear, $currentYear-30);
        return view('vendor.voyager.upload.index', compact('dinas', 'tahun'));
    }

    public function upload(Request $request)
    {
        $validate = [
            'tahun' => 'required|size:4',
            'no_spp' => 'required|regex:/^\S*$/u|unique:tb_spp,no_spp',
            'file_spp' => 'required|max:' . (setting('dokumen.max_upload_size') * 1024) . '|mimes:pdf',
        ];

        if (auth()->user()->role_id === User::$ROLE_DEV || auth()->user()->role_id === User::$ROLE_SUPERADMIN) {
            $validate['dinas'] = 'required';
        }

        // validasi input user
        $request->validate($validate);

        // set dinas sesuai user kecuali superadmin
        if (auth()->user()->role_id === User::$ROLE_DEV || auth()->user()->role_id === User::$ROLE_SUPERADMIN) {
            $dinas_id = $request->post('dinas');
        } else {
            $dinas_id = auth()->user()->dinas_id;
        }

        // create dokumen baru
        $newDokumen = Dokumen::create([
            'dinas_id' => $dinas_id,
            'status' => 'B', // belum tuntas
            'verifikasi_oleh' => 'B',
            'tahun' => $request->post('tahun'),
        ]);

        // create spp baru dengan hasOne ke dokumen
        Spp::create([
            'dokumen_id' => $newDokumen->id,
            'no_spp' => $request->post('no_spp'),
            'file' =>  $this->pdfEncode($request->file('file_spp')),
        ]);

        // redirect ke halaman perbarui/edit
        return redirect()->route('upload-dokumen.edit', $newDokumen->id)->with([
            'message' => "SPP telah berhasil ditambahkan",
            'alert-type' => 'success',
        ]);
    }

    public function edit(Dokumen $dokumen)
    {
        $this->checkPermission($dokumen);
        return view('vendor.voyager.upload.edit', compact('dokumen'));
    }

    public function update(Request $request, Dokumen $dokumen)
    {
        $this->checkPermission($dokumen);

        // validate spm form
        if ($request->post('no_spm') or $request->post('file_spm')) {
            $request->validate([
                'no_spm' => 'required|regex:/^\S*$/u|unique:tb_spm,no_spm',
                'file_spm' => 'required|max:' . (setting('dokumen.max_upload_size') * 1024) . '|mimes:pdf',
            ]);
            $dokumen->spm()->create([
                'no_spm' => $request->post('no_spm'),
                'file' => $this->pdfEncode($request->file('file_spm')),
            ]);
        }

        // validate sp2d form
        if ($request->post('no_sp2d') or $request->post('file_sp2d')) {
            $request->validate([
                'no_sp2d' => 'required|regex:/^\S*$/u|unique:tb_sp2d,no_sp2d',
                'file_sp2d' => 'required|max:' . (setting('dokumen.max_upload_size') * 1024) . '|mimes:pdf',
            ]);
            $dokumen->sp2d()->create([
                'no_sp2d' => $request->post('no_sp2d'),
                'file' => $this->pdfEncode($request->file('file_sp2d')),
            ]);
        }

        // check status
        $status = (isset($dokumen->spm) and isset($dokumen->sp2d)) ? 'S' : 'B';
        $dokumen->update(['status' => $status]);
        return redirect()->route('dokumen.index')->with([
            'message' => "Dokumen telah berhasil diperbarui",
            'alert-type' => 'success',
        ]);
    }

    private function pdfEncode($requestFile)
    {
        return base64_encode(file_get_contents($requestFile->path()));
    }

}
