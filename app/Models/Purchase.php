<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    const BOUGHT = 'BOUGHT';
    const SOLD = 'SOLD';
    const INACTIVE = 'INACTIVE';

    protected $table = 'purchases';

    protected $fillable = [
        'code',
        'weight',
        'purchase_price',
        'description',
        'age',
        'purchase_date'
    ];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function weights()
    {
        return $this->hasMany(TakeWeight::class);
    }
}
