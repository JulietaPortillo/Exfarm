<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    const ACTIVE = 'ACTIVE';
    const INACTIVE = 'INACTIVE';

    protected $table = 'sales';

    protected $fillable = [
        'code_id',
        'weight',
        'sale_price',
        'age',
        'sale_date'
    ];

    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }
}
