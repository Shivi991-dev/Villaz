<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Villa extends Model
{
    use HasFactory;
    function location(){
        return $this->hasOne(Location::class,'property_id','id');
    }
    function layout(){
        return $this->hasOne(PropertyDesc::class,'property_id','id');
    }
}
