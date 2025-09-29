<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProformaInvoice extends Model
{
    protected $fillable = ['lead_id','total','items'];

    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }
}
