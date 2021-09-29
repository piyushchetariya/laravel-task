<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class response extends Model
{
    use HasFactory;
    protected $table = 'response';

    protected $fillable = array('requestType','boardEnvironment','hardwareCode','currentFWVersion','updateAvailable','newFWVersion','fwLock','newFWURL');


}
