<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


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
 */
class Spm extends Model
{
    protected $table = 'tb_spm';
    protected $guarded = [];

    public function dokumen()
    {
        return $this->belongsTo(Dokumen::class, 'dokumen_id');
    }
}
