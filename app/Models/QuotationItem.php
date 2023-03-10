<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'quotation_id',
        'item_id',
        'quantity',
        'price',
    ];

    public function quotation()
    {
        return $this->belongsTo(Quotation::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function getTotalPriceAttribute()
    {
        return $this->price * $this->quantity;
    }

}
