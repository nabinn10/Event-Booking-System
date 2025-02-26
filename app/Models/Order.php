<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
    public function items()
    {
        return $this->belongsToMany(Item::class, 'order_items', 'order_id', 'item_id');
    }

   
    public function getItemNamesAttribute() {
        $itemIds = explode(',', $this->items); // If stored as CSV
        return \App\Models\Item::whereIn('id', $itemIds)->pluck('name')->implode(', ');
    }
}
