<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\Pendukung;
use App\Models\Sp2d;
use App\Models\Spm;
use App\Models\Spp;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
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
        //$document = $this->findDocument($jenisDokumen, $dokumenId);
        $document = Cache::remember($jenisDokumen.$dokumenId, 300, function() use ($jenisDokumen, $dokumenId){
            return $this->findDocument($jenisDokumen, $dokumenId);
        });

        $this->checkPermission($document);
        $data = base64_decode($document->file);
        header("Content-type:application/pdf");
        header("Content-Disposition:inline;filename=document.pdf");
        echo $data;
    }

    public function download($jenisDokumen, $dokumenId)
    {
        $dokumen = $this->findDocument($jenisDokumen, $dokumenId);
        $this->checkPermission($dokumen);
        $data = base64_decode($dokumen->file);
        $documentHash = strtoupper($this->documentHash($dokumenId, $jenisDokumen, 'adler32'));
        $jenisDokumen = strtoupper($jenisDokumen);
        header("Content-type:application/pdf");
        header("Content-Disposition:attachment;filename={$jenisDokumen}-{$documentHash}.pdf");
        echo $data;
    }

    public function downloadSemua($dokumenId)
    {
        $dokumen = Dokumen::findOrFail($dokumenId);
        $this->checkPermission($dokumenId);
        $files = [];

        // generate spp pdf
        $spp = $dokumen->spp->get(['id', 'file'])->first();
        $sppPath = "SPP-$spp->id.pdf";
        $files[] = $sppPath;
        file_put_contents($sppPath, base64_decode($spp->file));

        // generate spm pdf
        $spm = $dokumen->spm->get(['id', 'file'])->first();
        $spmPath = "SPM-$spm->id.pdf";
        $files[] = $spmPath;
        file_put_contents($spmPath, base64_decode($spm->file));

        // generate sp2d pdf
        $sp2d = $dokumen->sp2d->get(['id', 'file'])->first();
        $sp2dPath = "SP2D-$sp2d->id.pdf";
        $files[] = $sp2dPath;
        file_put_contents($sp2dPath, base64_decode($sp2d->file));

        // generate pendukung pdf
        foreach ($dokumen->pendukung as $pendukung) {
            $pendukungPath = "PENDUKUNG-$pendukung->id.pdf";
            $files[] = $pendukungPath;
            file_put_contents($pendukungPath, base64_decode($pendukung->file));
        }

        $zipfilename = 'DOKUMEN_' . time() . '.zip';
        $zip = new ZipArchive;
        $zip->open(storage_path($zipfilename), ZipArchive::CREATE);
        foreach ($files as $file) {
            $zip->addFile($file);
        }
        $zip->close();

        header('Content-Type: application/zip');
        header("Content-disposition: attachment; filename=$zipfilename");
        header('Content-Length: ' . filesize(storage_path($zipfilename)));
        readfile(storage_path($zipfilename));
        unlink(storage_path($zipfilename));
        exit();
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
