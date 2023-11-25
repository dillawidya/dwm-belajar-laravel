<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'category',
        'product_code',
        'price',
        'unit',
        'stock',
        'description'
    ];
    protected $primaryKey = 'product_id';

    public $incrementing = false;
    public $timestamps = true;
}
