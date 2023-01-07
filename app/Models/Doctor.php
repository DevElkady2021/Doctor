<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;


    protected $fillable = [
           'user_id','name',
           'email',
           'address','phone','note','about','other_data','image','Specialization'
    ];

    public function visits(){
        return $this->hasMany('App\Models\Visit','doctor_id');
    }
}
