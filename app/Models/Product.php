<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'product_id',
        'length_rmt',
        'quantity_pcs',
        'quantity_rmt',
        'no_bundles',
        'in_kg',
        'purchase_price',
        'gst',
        'hsn_code',
        'selling_price',
        'total_price',
        'low_stock',
    ];

    // Relationships
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function productCode()
    {
        return $this->belongsTo(Productcode::class, 'product_id');
    }
}
