<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Storage;

class PanduanController extends Controller
{
    public function index($userRole = null)
    {
        if (!$userRole) $userRole = auth()->user()->custom_role->id;

        if ($userRole == User::$ROLE_DEV || $userRole == User::$ROLE_SUPERADMIN) {
            $pdfUrl = Storage::url('SIKANDA-MANUAL_SUPERADMIN.pdf');
        } else if ($userRole == User::$ROLE_ADMIN) {
            $pdfUrl = Storage::url('SIKANDA-MANUAL_ADMIN.pdf');
        } else {
            $pdfUrl = Storage::url('SIKANDA-MANUAL_USER.pdf');
        }

        return view('vendor.voyager.panduan.index', compact('pdfUrl', 'userRole'));
    }
}
