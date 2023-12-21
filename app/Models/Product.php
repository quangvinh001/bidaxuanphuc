<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // use HasFactory;
    protected $table='products';
    protected $fillable=['name','id_type','description','unit_price','promotion_price','image','unit','new'];
    protected $primaryKey = 'id';
    public function product_types(){
        return $this->belongsTo('App\ProductType','id_type','id');
    }
    public function images()
    {
        return $this->hasMany(Images::class,'id','product_id');
    }
    
    public function getDiscountPercentageAttribute()
    {
        if ($this->unit_price > 0) {
            return round((($this->unit_price - $this->promotion_price) / $this->unit_price) * 100, 0);
        } else {
            return 0;
        }
    }
    public function bill_detail(){
        return $this->hasMany('App\BillDetail','id_product','id');
    }
}
