<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $table = 'sub_category';

    protected $fillable = [
        'subcategory_name',
        'category_id',
        'category_name',
        'slug',
    ];
}
