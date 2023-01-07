<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\patient;

class Visit extends Model
{
    use HasFactory;


    protected $fillable = ['date','patient_id','doctor_id','note',];


    public function patient(){
        return $this->belongsTo('App\Models\patient');
    }

    public function product(){
        return $this->belongsToMany('App\Models\Product');
    }

    public function doctor(){
        return $this->belongsTo('App\Models\Doctor');
    }
}
