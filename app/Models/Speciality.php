<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    public $timestamps = false;
    
    public function physician(){
    	return $this->belongsTo(Physician::class);
    }
}
