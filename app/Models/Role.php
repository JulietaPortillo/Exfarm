<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const ACTIVE = 'ACTIVE';
    const INACTIVE = 'INACTIVE';

    protected $table = 'roles';

    protected $fillable = [
        'description'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
