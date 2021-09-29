<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\Sp2d;
use App\Models\Spm;

class DokumenController extends Controller
{
    public function index($status = null)
    {
        if(auth()->user()->custom_role->id === 1) {
            $dokumens = Dokumen::paginate(10);
        } else {
            $dokumens = Dokumen::where('dinas_id', auth()->user()->dinas->id)->paginate(10);
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
        $this->authorize('delete', app('App\Models\Dokumen'));
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
        $this->authorize('delete', app('App\Models\Dokumen'));
        $sp2d->dokumen->update(['status' => 'B']);
        $sp2d->delete();
        return redirect()->back()->with([
            'message' => "SP2D telah berhasil dihapus",
            'alert-type' => 'success',
        ]);
    }
}
