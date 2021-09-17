<?php

namespace App\Http\Controllers;

class UploadController extends Controller
{
    public function index()
    {
        return view('vendor.voyager.upload.index');
    }
}
