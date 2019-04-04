<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advice extends Model
{
    

	public $fillable = ['physician_id', 
						'patient_id',
						'diagnostic',
						'medical_advice',
						'recipe',
						




];
}
