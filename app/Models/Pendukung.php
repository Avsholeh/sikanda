<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;


/**
 * App\Models\Pendukung
 *
 * @property int $id
 * @property int|null $dokumen_id
 * @property mixed $file
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Pendukung newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pendukung newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pendukung query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pendukung whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pendukung whereDokumenId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pendukung whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pendukung whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pendukung whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Pendukung extends Model
{
    use HasFactory;
    protected $table = 'tb_pendukung';
    protected $guarded = [];

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d M Y');
    }

    public function getUpdatedAtAttribute()
    {
        return Carbon::parse($this->attributes['updated_at'])->translatedFormat('l, d M Y');
    }

    public function dokumen()
    {
        return $this->belongsTo(Dokumen::class, 'dokumen_id');
    }
}
