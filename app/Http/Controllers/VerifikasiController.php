<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\User;
use Illuminate\Http\Request;

class VerifikasiController extends Controller
{

    public function show(Dokumen $dokumen)
    {
        $auth = [User::$ROLE_SUPERADMIN, User::$ROLE_DEV];
        if (!in_array(auth()->user()->custom_role->id, $auth))
            if ($dokumen->dinas_id !== auth()->user()->dinas_id)
                abort(401);

        return view('vendor.voyager.verifikasi.show', compact('dokumen'));
    }

    public function proses(Request $request)
    {
        $dokumen = Dokumen::findOrFail($request->dokumen_id);

        $auth = [User::$ROLE_SUPERADMIN, User::$ROLE_DEV];
        if (!in_array(auth()->user()->custom_role->id, $auth))
            if ($dokumen->dinas_id !== auth()->user()->dinas_id)
                abort(401);

        $dokumen->update([
            'status' => Dokumen::VERIFIKASI,
            'verifikasi_oleh' => auth()->user()->name,
        ]);

        return redirect()->route('dokumen.index')->with([
            'message' => "Dokumen berhasil diverifikasi.",
            'alert-type' => 'success',
        ]);

    }
}
