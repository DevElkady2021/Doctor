<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
  

    protected $table = 'product_visit';
    protected $fillable = [
        'visit_id',
        'product_id',
        'dose',
    ];
}
