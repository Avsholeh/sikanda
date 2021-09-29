<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;


/**
 * App\Models\Dokumen
 *
 * @property int $id
 * @property int $dinas_id
 * @property string $status
 * @property string $tahun
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Dokumen currentUser()
 * @method static \Illuminate\Database\Eloquent\Builder|Dokumen newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Dokumen newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Dokumen query()
 * @method static \Illuminate\Database\Eloquent\Builder|Dokumen whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dokumen whereDinasId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dokumen whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dokumen whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dokumen whereTahun($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dokumen whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Dinas $dinas
 * @property-read \App\Models\Sp2d|null $sp2d
 * @property-read \App\Models\Spm|null $spm
 * @property-read \App\Models\Spp|null $spp
 */
class Dokumen extends Model
{
    protected $table = 'tb_dokumen';

    protected $guarded = [];

    public function scopeCurrentUser($query)
    {
        if (Auth::user()->dinas_id) {
            return $query->where('dinas_id', Auth::user()->dinas_id);
        }
        return $query;
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y');
    }

    public function getUpdatedAtAttribute()
    {
        return Carbon::parse($this->attributes['updated_at'])->translatedFormat('l, d F Y');
    }

    public function dinas()
    {
        return $this->belongsTo(Dinas::class, 'dinas_id');
    }

    public function spp()
    {
        return $this->hasOne(Spp::class, 'dokumen_id');
    }

    public function spm()
    {
        return $this->hasOne(Spm::class, 'dokumen_id');
    }

    public function sp2d()
    {
        return $this->hasOne(Sp2d::class, 'dokumen_id');
    }
}
