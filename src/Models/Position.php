<?php

namespace Zzld\Foundation\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    public $model_name = 'position';
    public $model_label = '职位';
    protected $table = 't_auth_positions';

    protected $hidden = [
    ];
}
