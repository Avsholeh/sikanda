<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
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
                return $this->pencarianNoSp2d($pencarianText);
            default:
                abort(404);
        }
    }

    private function pencarianNoSp2d($pencarianText)
    {
        $dokumens = Dokumen::whereHas('sp2d', function(Builder $query) use ($pencarianText){
            return $query->where('no_sp2d', 'like', "%$pencarianText%");
        })
            ->where('status', 'S')
            ->paginate(10);
        return view('vendor.voyager.laporan.index', compact('dokumens', 'pencarianText'));
    }
}
