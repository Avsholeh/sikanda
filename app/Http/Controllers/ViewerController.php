<?php

namespace App\Http\Controllers;

use App\Models\Pendukung;
use App\Models\Sp2d;
use App\Models\Spm;
use App\Models\Spp;
use App\Models\User;
use Illuminate\Http\Request;

class ViewerController extends Controller
{
    public function index($dokumenId, $jenisDokumen, $documentHash)
    {
        if (!$this->documentVerify($dokumenId, $jenisDokumen, $documentHash)) {
            return 'access denied.';
        }
        $document = null;
        switch ($jenisDokumen) {
            case 'spp':
                $document = Spp::where('id', $dokumenId)->first();
                break;
            case 'spm':
                $document =  Spm::where('id', $dokumenId)->first();
                break;
            case 'sp2d':
                $document =  Sp2d::where('id', $dokumenId)->first();
                break;
            case 'pendukung':
                $document =  Pendukung::where('id', $dokumenId)->first();
                break;
        }
        $data = base64_decode($document->file);
        header("Content-type:application/pdf");
        header("Content-Disposition:inline;filename='document.pdf'");
        echo $data;
    }

    public function generate(Request $request)
    {
        $dokumenId = $request->post('dokumen_id');
        $jenisDokumen = $request->post('jenis_dokumen');
        return urlencode($this->documentHash($dokumenId, $jenisDokumen));
    }

    public function download($jenisDokumen, $dokumenId)
    {
        $document = null;
        switch ($jenisDokumen) {
            case 'spp':
                $document = Spp::where('id', $dokumenId)->first();
                break;
            case 'spm':
                $document =  Spm::where('id', $dokumenId)->first();
                break;
            case 'sp2d':
                $document =  Sp2d::where('id', $dokumenId)->first();
                break;
            case 'pendukung':
                $document =  Pendukung::where('id', $dokumenId)->first();
                break;
        }

        if (auth()->user()->custom_role->id  !== User::$ROLE_SUPERADMIN) {
            if ($document->dokumen and $document->dokumen->dinas_id !== auth()->user()->dinas_id) {
                abort(401);
            }
        }

        $data = base64_decode($document->file);
        $documentHash = strtoupper($this->documentHash($dokumenId, 1, 'adler32'));
        $jenisDokumen = strtoupper($jenisDokumen);
        header("Content-type:application/pdf");
        header("Content-Disposition:attachment;filename={$documentHash}-{$jenisDokumen}.pdf");
        echo $data;
    }

    private function documentHash($dokumenId, $jenisDokumen, $algo = 'gost')
    {
        $currentUserId = auth()->user()->id;
        return hash($algo, $currentUserId . '|' . $jenisDokumen . '|' . $dokumenId);
    }

    private function documentVerify($dokumenId, $jenisDokumen, $documentHash)
    {
        return $this->documentHash($dokumenId, $jenisDokumen) === $documentHash;
    }
}
