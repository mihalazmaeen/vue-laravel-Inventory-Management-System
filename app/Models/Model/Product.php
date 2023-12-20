<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Model\Category;
use App\Models\Model\Supplier;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
     public function supplier(){
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }
}
