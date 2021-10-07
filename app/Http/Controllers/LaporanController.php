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
        $this->authenticated = [User::$ROLE_ADMIN, User::$ROLE_SUPERADMIN];
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
        $pencarianText = $request->post('kolom_pencarian');
        switch ($request->post('kategori')) {
            case "no_sp2d":
                return $this->prosesPencarian($pencarianText, 'sp2d');
            case "no_spm":
                return $this->prosesPencarian($pencarianText, 'spm');
            case "no_spp":
                return $this->prosesPencarian($pencarianText, 'spp');
            default:
                abort(404);
        }
    }

    private function prosesPencarian($pencarianText, $type = 'sp2d')
    {
        // superadmin & admin dapat mencari semua dinas
        if (in_array(auth()->user()->custom_role->id, $this->authenticated)) {
            $dokumens = Dokumen::whereHas($type, function (Builder $query) use ($pencarianText, $type) {
                return $query->where('no_' . $type, 'like', "%$pencarianText%");
            })
                ->where('status', 'S')
                ->paginate(10);
        } else {
            $dokumens = Dokumen::whereHas($type, function (Builder $query) use ($pencarianText, $type) {
                return $query->where('no_' . $type, 'like', "%$pencarianText%");
            })
                ->where('status', 'S')
                ->where('dinas_id', auth()->user()->dinas->id)
                ->paginate(10);
        }
        return view('vendor.voyager.laporan.index', compact('dokumens', 'pencarianText'));
    }
}
