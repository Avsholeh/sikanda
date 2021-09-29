<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


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
 */
class Sp2d extends Model
{
    protected $table = 'tb_sp2d';
    protected $guarded = [];

    public function dokumen()
    {
        return $this->belongsTo(Dokumen::class, 'dokumen_id');
    }
}
