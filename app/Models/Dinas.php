<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Dinas
 *
 * @property int $id
 * @property int $kd_urusan
 * @property int $kd_bidang
 * @property int $kd_unit
 * @property int $kd_sub
 * @property string $nm_dinas
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Dinas newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Dinas newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Dinas query()
 * @method static \Illuminate\Database\Eloquent\Builder|Dinas whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dinas whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dinas whereKdBidang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dinas whereKdSub($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dinas whereKdUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dinas whereKdUrusan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dinas whereNmDinas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dinas whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Dinas extends Model
{
    protected $table = 'tb_dinas';
}
