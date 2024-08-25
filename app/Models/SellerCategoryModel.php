<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerCategoryModel extends Model {
    use HasFactory;
    protected $table ="category";
    protected $primaryKey ="category_id";

}