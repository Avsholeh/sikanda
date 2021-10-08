<?php

namespace App\Http\Controllers;

use App\Models\Sp2d;
use App\Models\Spm;
use App\Models\Spp;
use Illuminate\Http\Request;

class ViewerController extends Controller
{
    public function index($dokumenId, $jenisDokumen, $documentHash)
    {
        if (!$this->documentVerify($dokumenId, $jenisDokumen, $documentHash)) {
            return 'unverified.';
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

    private function documentHash($dokumenId, $jenisDokumen)
    {
        $currentUserId = auth()->user()->id;
        return hash('gost', $currentUserId . '|' . $jenisDokumen . '|' . $dokumenId);
    }

    private function documentVerify($dokumenId, $jenisDokumen, $documentHash)
    {
        return $this->documentHash($dokumenId, $jenisDokumen) === $documentHash;
    }
}
