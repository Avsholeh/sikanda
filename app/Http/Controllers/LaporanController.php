<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    private $authenticated;

    public function __construct()
    {
        $this->authenticated = [User::$ROLE_SUPERADMIN];
    }

    public function index()
    {
        return view('vendor.voyager.laporan.index');
    }

    public function pencarian(Request $request)
    {
        $request->validate([
            'kategori' => 'required',
            'kolom_pencarian' => 'required',
        ]);
        $kolomPencarian = $request->post('kolom_pencarian');
        switch ($request->post('kategori')) {
            case "no_sp2d":
                return $this->prosesPencarian($kolomPencarian, 'sp2d');
            case "no_spm":
                return $this->prosesPencarian($kolomPencarian, 'spm');
            case "no_spp":
                return $this->prosesPencarian($kolomPencarian, 'spp');
            default:
                abort(404);
        }
    }

    private function prosesPencarian($pencarianText, $type = 'sp2d')
    {
        // superadmin dapat mencari semua dinas
        if (in_array(auth()->user()->custom_role->id, $this->authenticated)) {
            $dokumens = Dokumen::whereHas($type, function (Builder $query) use ($pencarianText, $type) {
                return $query->where('no_' . $type, 'like', "%$pencarianText%");
            })
                ->where('status', Dokumen::SUDAH_TUNTAS)
                ->take(10)->get();
        } else {
            // admin dan user hanya dapat mencari dinas terkait
            $dokumens = Dokumen::whereHas($type, function (Builder $query) use ($pencarianText, $type) {
                return $query->where('no_' . $type, 'like', "%$pencarianText%");
            })
                ->where('status', Dokumen::SUDAH_TUNTAS)
                ->where('dinas_id', auth()->user()->dinas->id)
                ->take(10)->get();
        }

        return view('vendor.voyager.laporan.index', compact('dokumens', 'pencarianText'));
    }

    public function detail(Dokumen $dokumen)
    {
        return view('vendor.voyager.laporan.index', compact('dokumen', 'dokumen'));
    }
}
