<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;


/**
 * App\Models\Sp2d
 *
 * @property int $id
 * @property int|null $dokumen_id
 * @property string|null $no_sp2d
 * @property mixed $file
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Sp2d newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sp2d newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sp2d query()
 * @method static \Illuminate\Database\Eloquent\Builder|Sp2d whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sp2d whereDokumenId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sp2d whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sp2d whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sp2d whereNoSp2d($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sp2d whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Dokumen|null $dokumen
 * @method static \Database\Factories\Sp2dFactory factory(...$parameters)
 */
class Sp2d extends Model
{
    use HasFactory;
    protected $table = 'tb_sp2d';
    protected $guarded = [];

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, F M Y');
    }

    public function getUpdatedAtAttribute()
    {
        return Carbon::parse($this->attributes['updated_at'])->translatedFormat('l, F M Y');
    }

    public function dokumen()
    {
        return $this->belongsTo(Dokumen::class, 'dokumen_id');
    }

    public function getNoSp2dAttribute()
    {
        return $this->attributes['no_sp2d'] ?? '-';
    }
}
