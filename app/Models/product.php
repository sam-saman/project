<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

protected $table ='products';
protected $fillable =[

   'p_name',
   'brand', 
    'price',
    'image', 
    
    
];
}
