<?php

namespace App\Http\Controllers;

use App\Models\Spp;

class PDFViewerController extends Controller
{
    public function index()
    {
        return view('vendor.voyager.pdfviewer.index');
        $document = Spp::first();
//        dd($document);
        $data = base64_decode($document->file);
        echo $data;
    }
}
