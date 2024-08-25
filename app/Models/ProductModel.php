<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductModel extends Model {
    use HasFactory;
    protected $table = "product";
    protected $primaryKey = "productId";


}