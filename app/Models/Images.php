<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;
    protected $table='images';
    protected $fillable=['product_id','path'];
    protected $primaryKey = 'id';
    public function product_images()
    {
        return $this->belongsTo(Product::class);
    }
}
