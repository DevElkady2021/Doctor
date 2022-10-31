<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\patient;

class Visit extends Model
{
    use HasFactory;


    protected $table = 'visits';
    protected $fillable = [
        'date',
        'patient_id',
        
    ];


    public function patient(){
        return $this->belongsTo('App\Models\patient');
    }

    public function product(){
        return $this->belongsToMany('App\Models\Product');
    }
}
