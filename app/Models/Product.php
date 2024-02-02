<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'sku',
        'title',
        'level1',
        'level2',
        'level3',
        'price',
        'priceSP',
        'quantity',
        'fields',
        'featured',
        'unit',
        'img',
        'main',
        'description',
    ];
}
