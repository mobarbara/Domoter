<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GatData extends Model
{
    protected $table = 'gateways';
    protected $fillable = ['name','topic'];
}
