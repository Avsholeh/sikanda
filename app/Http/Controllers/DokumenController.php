<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\Pendukung;
use App\Models\Sp2d;
use App\Models\Spm;
use App\Models\User;

class DokumenController extends Controller
{
    public function index($status = null)
    {
        if (!in_array($status, [
            'semua',
            'belum-tuntas',
            'sudah-tuntas',
            'verifikasi',
        ]))
            return redirect()->route('dokumen.index', 'semua');

        if ($status === 'belum-tuntas') $status = Dokumen::BELUM_TUNTAS;
        if ($status === 'sudah-tuntas') $status = Dokumen::SUDAH_TUNTAS;
        if ($status === 'verifikasi') $status = Dokumen::VERIFIKASI;

        $dokumens = [];
        $statusList = [Dokumen::BELUM_TUNTAS, Dokumen::SUDAH_TUNTAS, Dokumen::VERIFIKASI];

        // dokumen untuk dev & superadmin
        $highPrivileges = [User::$ROLE_DEV, User::$ROLE_SUPERADMIN];
        if (in_array(auth()->user()->custom_role->id, $highPrivileges)) {
            if (in_array($status, $statusList)) {
                $dokumens = Dokumen::where('status', $status)
                    ->orderByDesc('created_at')->paginate(10);
            } else {
                $dokumens = Dokumen::orderByDesc('created_at')->paginate(10);;
            }
            // dokumen untuk admin dan user
        } else {
            if (in_array($status, $statusList)) {
                $dokumens = Dokumen::where([
                    'status' => $status,
                    'dinas_id' => auth()->user()->dinas->id,
                ])->orderByDesc('created_at')->paginate(10);;
            } else {
                $dokumens = Dokumen::where('dinas_id', auth()->user()->dinas->id)
                    ->orderByDesc('created_at')
                    ->paginate(10);;
            }
        }
        return view('vendor.voyager.dokumen.index', [
            'dokumens' => $dokumens,
            'status' => $status
        ]);
    }

    public function show(Dokumen $dokumen)
    {
        $auth = [User::$ROLE_SUPERADMIN, User::$ROLE_DEV];
        if (!in_array(auth()->user()->custom_role->id, $auth))
            if ($dokumen->dinas_id !== auth()->user()->dinas_id)
                abort(401);

        return view('vendor.voyager.dokumen.show', compact('dokumen'));
    }

    public function delete(Dokumen $dokumen)
    {
        // Check permission
        $this->authorize('delete', app('App\Models\Dokumen'));
        $dokumen->delete();
        return redirect()->back()->with([
            'message' => "Dokumen telah berhasil dihapus",
            'alert-type' => 'success',
        ]);
    }

    public function deleteSpm(Spm $spm)
    {
        // Check permission
        $this->authorize('delete', app('App\Models\Spm'));
        $spm->dokumen->update(['status' => Dokumen::BELUM_TUNTAS]);
        $spm->delete();
        return redirect()->back()->with([
            'message' => "SPM telah berhasil dihapus",
            'alert-type' => 'success',
        ]);
    }

    public function deleteSp2d(Sp2d $sp2d)
    {
        // Check permission
        $this->authorize('delete', app('App\Models\Sp2d'));
        $sp2d->dokumen->update(['status' => Dokumen::BELUM_TUNTAS]);
        $sp2d->delete();
        return redirect()->back()->with([
            'message' => "SP2D telah berhasil dihapus",
            'alert-type' => 'success',
        ]);
    }

    public function deletePendukung(Pendukung $pendukung)
    {
        // Check permission
        $this->authorize('delete', app('App\Models\Pendukung'));
        $pendukung->dokumen->update(['status' => Dokumen::BELUM_TUNTAS]);
        $pendukung->delete();
        return redirect()->back()->with([
            'message' => "Pendukung telah berhasil dihapus",
            'alert-type' => 'success',
        ]);
    }
}
