<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
class Productcode extends Model
{
   use HasFactory;

    protected $fillable = [
        'category_id',
        'product_code',
        'product_name',
        'pcs_per_bundle',
        'pcs_m_per_kg',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
