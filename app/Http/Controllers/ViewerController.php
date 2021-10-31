<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\Pendukung;
use App\Models\Sp2d;
use App\Models\Spm;
use App\Models\Spp;
use App\Models\User;
use ZipArchive;

class ViewerController extends Controller
{
    public function checkPermission($dokumen)
    {
        $auth = [User::$ROLE_SUPERADMIN, User::$ROLE_DEV];
        if (!in_array(auth()->user()->custom_role->id, $auth))
            if ($dokumen->dokumen and $dokumen->dokumen->dinas_id !== auth()->user()->dinas_id)
                abort(401);
    }

    public function preview($jenisDokumen, $dokumenId)
    {
        $document = $this->findDocument($jenisDokumen, $dokumenId);
        $this->checkPermission($document);
        $data = base64_decode($document->file);
        header("Content-type:application/pdf");
        header("Content-Disposition:inline;filename=document.pdf");
        echo $data;
    }

    public function download($jenisDokumen, $dokumenId)
    {
        $document = $this->findDocument($jenisDokumen, $dokumenId);
        $this->checkPermission($document);
        $data = base64_decode($document->file);
        $documentHash = strtoupper($this->documentHash($dokumenId, $jenisDokumen, 'adler32'));
        $jenisDokumen = strtoupper($jenisDokumen);
        header("Content-type:application/pdf");
        header("Content-Disposition:attachment;filename={$jenisDokumen}-{$documentHash}.pdf");
        echo $data;
    }

    public function downloadAll()
    {
        $zip = new \ZipArchive;
        $zip->open('file.zip', ZipArchive::CREATE);
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

    private function documentHash($dokumenId, $jenisDokumen, $algo = 'gost')
    {
        $currentUserId = auth()->user()->id;
        return hash($algo, $currentUserId . '|' . $jenisDokumen . '|' . $dokumenId);
    }

}
