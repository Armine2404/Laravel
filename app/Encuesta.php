<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    protected $fillable = ['diseño', 'desarrollo', 'funcionamiento'];
}

