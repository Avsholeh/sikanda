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
        $document = $this->findDocument($jenisDokumen, $dokumenId);
        $data = base64_decode($document->file);
        header("Content-type:application/pdf");
        header("Content-Disposition:inline;filename='document.pdf'");
        echo $data;
    }

    public function download($jenisDokumen, $dokumenId)
    {
        $document = $this->findDocument($jenisDokumen, $dokumenId);

        if (auth()->user()->custom_role->id !== User::$ROLE_SUPERADMIN) {
            if ($document->dokumen and $document->dokumen->dinas_id !== auth()->user()->dinas_id) {
                abort(401);
            }
        }

        $data = base64_decode($document->file);
        $documentHash = strtoupper($this->documentHash($dokumenId, $jenisDokumen, 'adler32'));
        $jenisDokumen = strtoupper($jenisDokumen);
        header("Content-type:application/pdf");
        header("Content-Disposition:.attachment;filename={$jenisDokumen}-{$documentHash}.pdf");
        echo $data;
    }

    public function downloadAll()
    {

    }

    private function findDocument($jenisDokumen, $dokumenId)
    {
        $document = null;
        switch ($jenisDokumen) {
            case 'spp':
                $document = Spp::where('id', $dokumenId)->first();
                break;
            case 'spm':
                $document = Spm::where('id', $dokumenId)->first();
                break;
            case 'sp2d':
                $document = Sp2d::where('id', $dokumenId)->first();
                break;
            case 'pendukung':
                $document = Pendukung::where('id', $dokumenId)->first();
                break;
        }
        return $document;
    }


    public function generate(Request $request)
    {
        $dokumenId = $request->post('dokumen_id');
        $jenisDokumen = $request->post('jenis_dokumen');
        return urlencode($this->documentHash($dokumenId, $jenisDokumen));
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
