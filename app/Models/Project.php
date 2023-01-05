<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'name',
        'size',
        'date',
        'client_ref',
        'country',
        'city',
        'address',
        'client_contact_id',
        'client_id',
        'payment_terms',
    ];


    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function client_contact()
    {
        return $this->belongsTo(ClientContact::class);
    }


}
