<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProductType extends Model
{
    use HasFactory;
    protected $table ='type_products';
    protected $fillable=['name','description','slug'];
    protected $primaryKey = 'id';
    public function products(){
        return $this ->hasMany(Product::class,'id_type','id');
    }
}
