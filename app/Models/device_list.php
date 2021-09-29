<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class device_list extends Model
{
    use HasFactory;
    protected $table = 'device_list';

    protected $fillable = array('request_type','board_type','mac_id','current_firmware');


}
