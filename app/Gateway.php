<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gateway extends Model
{
   protected $fillable = ['name', 'mqtt_server', 'mqtt_port', 'mqtt_username', 'mqtt_password'];
}
