<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;


/**
 * App\Models\Spp
 *
 * @property int $id
 * @property int|null $dokumen_id
 * @property string|null $no_spp
 * @property mixed $file
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Spp newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Spp newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Spp query()
 * @method static \Illuminate\Database\Eloquent\Builder|Spp whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spp whereDokumenId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spp whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spp whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spp whereNoSpp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spp whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Dokumen|null $dokumen
 * @method static \Database\Factories\SppFactory factory(...$parameters)
 */
class Spp extends Model
{
    use HasFactory;
    protected $table = 'tb_spp';
    protected $guarded = [];

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, F M Y');
    }

    public function getUpdatedAtAttribute()
    {
        return Carbon::parse($this->attributes['updated_at'])->translatedFormat('l, F M Y');
    }

    public function getNoSppAttribute()
    {
        return $this->attributes['no_spp'] ?? '-';
    }

    public function dokumen()
    {
        return $this->belongsTo(Dokumen::class, 'dokumen_id');
    }
}
