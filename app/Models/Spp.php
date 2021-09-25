<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


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
 */
class Spp extends Model
{
    protected $table = 'tb_spp';
    protected $guarded = [];
}
