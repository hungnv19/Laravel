<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    public $timestamps = false;
    protected $fillable = [
     'name',
     'price',
     'quantity',
     'avatar',
     'describe',
     'promotion',
     'category_id',
     'size'
    ];
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
