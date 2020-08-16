<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TakeWeight extends Model
{
    const ACTIVE = 'ACTIVE';
    const INACTIVE = 'INACTIVE';

    protected $table = 'take_weights';

    protected $fillable = [
        'code_id',
        'weight',
        'registration_date'
    ];

    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }
}
