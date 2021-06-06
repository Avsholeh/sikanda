<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Dokumen extends Model
{
    protected $table = 'tb_dokumen';

    public function scopeCurrentUser($query)
    {
        if (Auth::user()->dinas_id) {
            return $query->where('dinas_id', Auth::user()->dinas_id);
        }
        return $query;
    }
}
