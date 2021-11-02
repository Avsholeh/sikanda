<?php

namespace App\Http\Controllers;

use App\Models\Dinas;
use App\Models\Dokumen;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    private $authenticated;

    public function __construct()
    {
        $this->authenticated = [User::$ROLE_DEV, User::$ROLE_SUPERADMIN];
    }

    public function dataDokumen()
    {
        return view('vendor.voyager.laporan.data_dokumen');
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
//                ->where('status', Dokumen::SUDAH_TUNTAS)
//                ->orWhere('status', Dokumen::VERIFIKASI)
                ->whereIn('status', [Dokumen::SUDAH_TUNTAS, Dokumen::VERIFIKASI])
                ->take(10)->get();
        } else {
            // admin dan user hanya dapat mencari dinas terkait
            $dokumens = Dokumen::whereHas($type, function (Builder $query) use ($pencarianText, $type) {
                return $query->where('no_' . $type, 'like', "%$pencarianText%");
            })
                ->where('dinas_id', auth()->user()->dinas->id)
//                ->where('status', '=', Dokumen::SUDAH_TUNTAS)
//                ->orWhere('status', '=', Dokumen::VERIFIKASI)
                ->whereIn('status', [Dokumen::SUDAH_TUNTAS, Dokumen::VERIFIKASI])
                ->take(10)->get();
        }

        return view('vendor.voyager.laporan.data_dokumen', compact('dokumens', 'pencarianText'));
    }

    public function detail(Dokumen $dokumen)
    {
        return view('vendor.voyager.laporan.data_dokumen', compact('dokumen', 'dokumen'));
    }

    public function rekapDokumen(Request $request)
    {
        $authenticated = [User::$ROLE_DEV, User::$ROLE_SUPERADMIN];

        // menampilkan semua dinas
        if (in_array(auth()->user()->custom_role->id, $authenticated)) {
            $dinasSelect = Dinas::all(['id', 'nm_dinas']);
        } else {
            // menampilkan dinas yg terkait dengan user
            $dinasSelect = Dinas::where(['id' => auth()->user()->dinas_id])->get(['id', 'nm_dinas']);
        }

        if ($request->getMethod() === 'GET') {
            return view('vendor.voyager.laporan.rekap_dokumen', compact('dinasSelect'));
        }

        if ($request->method() === 'POST') {
            $request->validate(['dinas' => 'required']);
            $dinasSelected = $request->post('dinas');
            $rekapDokumen = DB::table('tb_dinas')
                ->selectRaw("
                tb_dinas.nm_dinas as dinas, 
                count(tb_dokumen.id) as dokumen,
                count(tb_spp.id) as spp, 
                count(tb_spm.id) as spm,
                count(tb_sp2d.id) as sp2d,
                count(tb_pendukung.id) as pendukung
            ")
                ->leftJoin('tb_dokumen', 'tb_dokumen.dinas_id', '=', 'tb_dinas.id')
                ->leftJoin('tb_spp', 'tb_spp.dokumen_id', '=', 'tb_dokumen.id')
                ->leftJoin('tb_spm', 'tb_spm.dokumen_id', '=', 'tb_dokumen.id')
                ->leftJoin('tb_sp2d', 'tb_sp2d.dokumen_id', '=', 'tb_dokumen.id')
                ->leftJoin('tb_pendukung', 'tb_pendukung.dokumen_id', '=', 'tb_dokumen.id')
                ->groupBy('tb_dinas.id');

            if ($request->post('dinas') === 'semua') {
                $rekapDokumen = Cache::remember($dinasSelected, 300, function () use ($rekapDokumen) {
                    return $rekapDokumen->get();
                });
            } else {
                $rekapDokumen = Cache::remember($dinasSelected, 300, function () use ($dinasSelected, $rekapDokumen) {
                    return $rekapDokumen
                        ->where('tb_dinas.id', '=', $dinasSelected)
                        ->get();
                });


            }
            return view('vendor.voyager.laporan.rekap_dokumen', compact('rekapDokumen', 'dinasSelect', 'dinasSelected'));
        }

        return redirect()->route('laporan.data_dokumen');

    }
}

/*
            select tb_dinas.nm_dinas as dinas, count(tb_spp.id) as spp, count(tb_spm.id) as spm from tb_dinas

            left join tb_dokumen
            on tb_dokumen.dinas_id = tb_dinas.id

            left join tb_spp
            on tb_spp.dokumen_id = tb_dokumen.id

            left join tb_spm
            on tb_spm.dokumen_id = tb_dokumen.id

            group by tb_dinas.id
         */