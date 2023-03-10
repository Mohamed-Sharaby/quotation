<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'trn',
        'phone',
        'location',
    ];

    public function contacts()
    {
        return $this->hasMany(ClientContact::class);
    }
}
