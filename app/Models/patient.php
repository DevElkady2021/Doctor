<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Visit;

class patient extends Model
{
    use HasFactory;

    protected $table = 'patients';
    protected $fillable = [
           'name',
           'age',
           'address',
    ];

    public function visits(){
        return $this->hasMany('App\Models\Visit','patient_id');
    }
}
