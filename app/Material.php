<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Material extends Model
{
    use SoftDeletes;

    protected $table = 'materials';
    protected $fillable = [
        'title',
    ];

    protected $dates = ['deleted_at'];
}
