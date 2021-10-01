<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\Sp2d;
use App\Models\Spm;

class DokumenController extends Controller
{
    public function index($status = null)
    {
        if (!in_array($status, ['semua', 'belum-tuntas', 'sudah-tuntas'])) {
            return redirect()->route('dokumen.index', 'semua');
        }

        if ($status === 'belum-tuntas') $status = 'b';
        if ($status === 'sudah-tuntas') $status = 's';

        $dokumens = [];

        if (auth()->user()->custom_role->id === 1) {
            // dokumen untuk superadmin
            if (in_array($status, ['b', 's'])) {
                $dokumens = Dokumen::where('status', strtoupper($status))
                    ->orderByDesc('created_at')
                    ->paginate(10);
            } else {
                $dokumens = Dokumen::orderByDesc('created_at')->paginate(10);;

            }
        } else {
            // dokumen untuk admin dan user
            if (in_array($status, ['b', 's'])) {
                $dokumens = Dokumen::where([
                    'status' => strtoupper($status),
                    'dinas_id' => auth()->user()->dinas->id
                ])
                    ->orderByDesc('created_at')
                    ->paginate(10);;
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
        $spm->dokumen->update(['status' => 'B']);
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
        $sp2d->dokumen->update(['status' => 'B']);
        $sp2d->delete();
        return redirect()->back()->with([
            'message' => "SP2D telah berhasil dihapus",
            'alert-type' => 'success',
        ]);
    }
}
