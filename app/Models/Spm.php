<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;


/**
 * App\Models\Spm
 *
 * @property int $id
 * @property int|null $dokumen_id
 * @property string|null $no_spm
 * @property mixed $file
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Spm newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Spm newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Spm query()
 * @method static \Illuminate\Database\Eloquent\Builder|Spm whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spm whereDokumenId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spm whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spm whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spm whereNoSpm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spm whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Dokumen|null $dokumen
 * @method static \Database\Factories\SpmFactory factory(...$parameters)
 */
class Spm extends Model
{
    use HasFactory;
    protected $table = 'tb_spm';
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

    public function getNoSpmAttribute()
    {
        return $this->attributes['no_spm'] ?? '-';
    }
}
