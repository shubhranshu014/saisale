<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Productcode;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function productcode()
    {
        return $this->hasMany(Productcode::class);
    }
}
