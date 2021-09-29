<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fw_list extends Model
{
    use HasFactory;
    protected $table = 'fw_list';

    protected $fillable = array('latest_version','environment','board_type','FW_file');


}
